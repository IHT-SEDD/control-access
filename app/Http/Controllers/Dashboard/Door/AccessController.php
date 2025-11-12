<?php

namespace App\Http\Controllers\Dashboard\Door;

use App\Http\Controllers\Controller;
use App\Services\Camera\LivePreviewService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Throwable;

class AccessController extends Controller
{
    public function accessControl($doorId, $action)
    {
        try {
            $ip = '192.168.1.13';
            $username = 'admin';
            $password = 'IsolaNo1_';

            $command = <<<XML
            <RemoteControlDoor>
                <cmd>{$action}</cmd>
            </RemoteControlDoor>
            XML;

            $response = Http::withDigestAuth($username, $password)
                ->timeout(0)
                ->retry(3, 1000)
                ->withoutVerifying()
                ->withHeaders(['Content-Type' => 'application/xml'])
                ->withBody($command, 'application/xml')
                ->put("http://$ip/ISAPI/AccessControl/RemoteControl/door/$doorId");

            if ($response->successful()) {
                $preview = $this->livePreview($doorId);

                return response()->json([
                    'success' => true,
                    'message' => $action === 'open'
                        ? 'Door opened successfully'
                        : 'Door locked successfully',
                    'response' => $response->body(),
                    'preview' => $preview,
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => 'Failed to send command to device',
                'status' => $response->status(),
                'response' => $response->body(),
            ], 500);
        } catch (Throwable $e) {
            Log::error('[AccessController] accessControl error: ' . $e->getMessage(), [
                'doorId' => $doorId,
                'action' => $action,
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred while processing the door command.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    private function livePreview(int $doorId)
    {
        try {
            $service = app(LivePreviewService::class);
            return $service->getLivePreviewUrl($doorId);
        } catch (Throwable $e) {
            Log::warning('[AccessController] livePreview error: ' . $e->getMessage());
            return null;
        }
    }
}
