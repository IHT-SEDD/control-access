<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nvr extends Model
{
    protected $guarded = ['id'];

    public static $rules = [
        'create' => [
            'tower_id' => 'required|exists:towers,id',
            'brand' => 'required|string|max:100',
            'type' => 'nullable|string|max:100',
            'name' => 'required|string|max:100|unique:nvrs,name',
            'initial' => 'nullable|string|max:50|unique:nvrs,initial',
            'description' => 'nullable|string',
            'ip_address' => 'required|string|unique:nvrs,ip_address',
            'auth_type' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
            'is_active' => 'required|boolean',
        ],

        'update' => [
            'tower_id' => 'required|exists:towers,id',
            'brand' => 'required|string|max:100',
            'type' => 'nullable|string|max:100',
            'name' => 'required|string|max:100|unique:nvrs,name,{id}',
            'initial' => 'nullable|string|max:50|unique:nvrs,initial,{id}',
            'description' => 'nullable|string',
            'ip_address' => 'required|string|unique:nvrs,ip_address,{id}',
            'auth_type' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string',
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
            if ($lastRecord && preg_match('/NVR(\d+)-\d{6}/', $lastRecord->code, $matches)) {
                $lastNumber = (int) $matches[1];
            }

            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

            return 'NVR' . $newNumber . '-' . $today->format('dmy');
        });
    }

    public function tower()
    {
        return $this->belongsTo(Tower::class);
    }

    public function cameras()
    {
        return $this->hasMany(Camera::class);
    }
}
