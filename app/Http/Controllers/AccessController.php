<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AccessController extends Controller
{
    public function toggle($doorId, $action = 'open')
    {

        $ip = '192.168.1.13';
        $action = 'open';
        $doorId = '1';
         $username = 'admin';
        $password = 'IsolaNo1_';

         $command = <<<XML
        <RemoteControlDoor>
            <cmd>{$action}</cmd>
        </RemoteControlDoor>
        XML;

        $response = Http::withDigestAuth('admin', 'IsolaNo1_')
        ->timeout(0)
        ->retry(3, 1000)
        ->withoutVerifying()
        ->withHeaders(['Content-Type' => 'application/xml'])
        ->withBody($command, 'application/xml')
        ->put("http://$ip/ISAPI/AccessControl/RemoteControl/door/$doorId");


        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'message' => $action === 'open'
                    ? 'Door opened successfully'
                    : 'Door locked successfully',
                'response' => $response->body(),
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Failed to send command to device',
            'status' => $response->status(),
            'response' => $response->body(),
        ], 500);
    }
}
