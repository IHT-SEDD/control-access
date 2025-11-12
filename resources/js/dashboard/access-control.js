import $ from "jquery";

let activeStreams = {};

const accessControlDoor = () => {
    $(".door-btn").on("click", function () {
        const $btn = $(this);
        const doorId = $btn.data("door");
        const action = $btn.data("action");
        const $status = $(`.door-status[data-door='${doorId}']`);
        const csrfToken = $('meta[name="csrf-token"]').attr("content");

        $btn.prop("disabled", true).text("Processing...");

        $.ajax({
            url: `/door/${doorId}/${action}`,
            type: "PUT",
            headers: { "X-CSRF-TOKEN": csrfToken },
            dataType: "json",
            success: function (data) {
                if (data.success) {
                    const newState =
                        data.new_state ??
                        (action === "open" ? "Opened" : "Closed");
                    $status.text(newState);
                }
            },
            error: function (xhr) {
                console.error(`Connection error (${xhr.status})`);
            },
            complete: function () {
                $btn.prop("disabled", false).text(
                    action === "open" ? "Unlock" : "Lock"
                );
            },
        });
    });
};

const livePreviewCam = async (previewCam) => {
    const doorId = previewCam.id.replace("preview_cam_", "");
    const streamUrl = previewCam.getAttribute("data-stream");
    if (!streamUrl) return;
    if (activeStreams[doorId]) return;

    try {
        const pc = new RTCPeerConnection({
            iceServers: [{ urls: "stun:stun.l.google.com:19302" }],
        });

        activeStreams[doorId] = pc;
        pc.addTransceiver("video", { direction: "recvonly" });

        pc.ontrack = (event) => {
            previewCam.srcObject = event.streams[0];
        };

        const offer = await pc.createOffer();
        await pc.setLocalDescription(offer);

        const resp = await fetch(streamUrl, {
            method: "POST",
            headers: { "Content-Type": "application/sdp" },
            body: offer.sdp,
        });

        const answerSDP = await resp.text();
        await pc.setRemoteDescription({ type: "answer", sdp: answerSDP });
    } catch (err) {
        delete activeStreams[doorId];
    }
};

const initLivePreviews = () => {
    document.querySelectorAll("video[id^='preview_cam_']").forEach((video) => {
        livePreviewCam(video);
    });
};

const unlockAllDoor = () => {
    $(".door-btn[data-action='open']").each(function () {
        $(this).trigger("click");
    });
};

const lockAllDoor = () => {
    $(".door-btn[data-action='close']").each(function () {
        $(this).trigger("click");
    });
};

document.addEventListener("DOMContentLoaded", () => {
    accessControlDoor();
    initLivePreviews();
    $(".unlock-all-btn").on("click", unlockAllDoor);
    $(".lock-all-btn").on("click", lockAllDoor);
});
