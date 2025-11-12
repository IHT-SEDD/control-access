<?php

namespace App\Services\Camera;

use App\Enums\MasterStatus;
use App\Models\Master\Camera;
use App\Models\Master\Nvr;
use Illuminate\Support\Facades\Log;

class LivePreviewService
{
 protected $mediamtxHost;

 public function __construct()
 {
  $this->mediamtxHost = config('services.mediamtx.host', '127.0.0.1:8889');
 }

 public function getLivePreviewUrl(int $doorId): ?string
 {
  $door = Door::with(['camera'])->where('door_id', $doorId)
   ->where('is_active', MasterStatus::Active)
   ->orderBy('code', 'asc')
   ->first();

  return $door ? $this->buildUrl($door, $doorId) : null;
 }

 private function buildUrl(Door $door, int $doorId): ?string
 {
  $nvr = Nvr::find($door->camera->nvr_id);
  if (!$nvr) {
   Log::channel('camera-control')
    ->warning("[Live Preview] NVR in door {$doorId} Not Found!");
   return null;
  }

  $cameraPath = $door->camera->code;
  Log::channel('camera-control')->info("[Live Preview] Camera success integrated :", [
   'cameraPath' => $cameraPath,
  ]);

  $whepUrl = sprintf(
   "https://%s/%s/whep",
   $this->mediamtxHost,
   $cameraPath
  );

  Log::channel('camera-control')->info("[Live Preview] WHEP URL created successfully => {$whepUrl}");

  return $whepUrl;
 }
}
