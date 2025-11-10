const btnSignIn = document.getElementById("btn-signin");
const btnSignUp = document.getElementById("btn-signup");

function resetClasses() {
    [btnSignIn, btnSignUp].forEach((btn) => {
        btn.classList.remove(
            "bg-blaze-orange/90",
            "border",
            "border-blaze-orange",
            "text-white"
        );
        btn.classList.add("text-spanish-grey");
    });
}

function setActiveButton(path) {
    if (path.includes("/login")) {
        resetClasses();
        btnSignIn.classList.add(
            "bg-blaze-orange/90",
            "border",
            "border-blaze-orange",
            "text-white",
            "shadow-md"
        );
        btnSignIn.classList.remove("text-spanish-grey");
    } else if (path.includes("/register")) {
        resetClasses();
        btnSignUp.classList.add(
            "bg-blaze-orange/90",
            "border",
            "border-blaze-orange",
            "text-white",
            "shadow-md"
        );
        btnSignUp.classList.remove("text-spanish-grey");
    } else {
        resetClasses();
    }
}

document.addEventListener("DOMContentLoaded", function () {
    const path = window.location.pathname;
    setActiveButton(path);
});
