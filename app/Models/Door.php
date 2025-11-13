<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Door extends Model
{
    protected $guarded = ['id'];

    public $rules = [
        'create' => [
            'name' => 'required|string|max:100|unique:doors,name',
            'description' => 'nullable|string|max:255',
            'ip_address' => 'required|ip',
        ],
        'update' => [
            'name' => 'required|string|max:100|unique:doors,name,{id}',
            'description' => 'nullable|string|max:255',
            'ip_address' => 'required',
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
            if ($lastRecord && preg_match('/DOOR(\d+)-\d{6}/', $lastRecord->code, $matches)) {
                $lastNumber = (int) $matches[1];
            }

            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

            return 'DOOR' . $newNumber . '-' . $today->format('dmy');
        });
    }

    public function tower()
    {
        return $this->belongsTo(Tower::class);
    }

    public function cameras()
    {
        return $this->hasManyThrough(
            Camera::class,
            Nvr::class,
            'tower_id',
            'nvr_id',
            'tower_id',
            'id'
        );
    }
}
