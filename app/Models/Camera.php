<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Camera extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'create' => [
            'nvr_id' => 'required|exists:nvrs,id',
            'brand' => 'required|string|max:100',
            'type' => 'nullable|string|max:100',
            'name' => 'required|string|max:100|unique:cameras,name',
            'initial' => 'nullable|string|max:50|unique:cameras,initial',
            'description' => 'nullable|string',
            'ip_address' => 'required|string|unique:cameras,ip_address',
            'channel' => 'required|string|max:50',
            'is_active' => 'required|boolean',
        ],

        'update' => [
            'nvr_id' => 'required|exists:nvrs,id',
            'brand' => 'required|string|max:100',
            'type' => 'nullable|string|max:100',
            'name' => 'required|string|max:100|unique:cameras,name,{id}',
            'initial' => 'nullable|string|max:50|unique:cameras,initial,{id}',
            'description' => 'nullable|string',
            'ip_address' => 'required|string|unique:cameras,ip_address,{id}',
            'channel' => 'required|string|max:50',
            'is_active' => 'required|boolean',
        ],
    ];

    public $autoGenerate = [
        'code' => 'custom',
    ];

    public function generateCustomCode()
    {
        $today = now();

        return DB::transaction(function () use ($today) {

            $lastRecord = static::class::whereYear('created_at', $today->year)
                ->lockForUpdate()
                ->latest('id')
                ->first();

            $lastNumber = 0;
            if ($lastRecord && preg_match('/CAM(\d+)-\d{6}/', $lastRecord->code, $matches)) {
                $lastNumber = (int) $matches[1];
            }

            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

            return 'CAM' . $newNumber . '-' . $today->format('dmy');
        });
    }

    public function nvr()
    {
        return $this->belongsTo(Nvr::class);
    }

    public function tower()
    {
        return $this->hasOneThrough(Tower::class, Nvr::class, 'id', 'id', 'nvr_id', 'tower_id');
    }
}
