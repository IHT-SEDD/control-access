<?php

namespace App\Services;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class MasterDataService
{
    /**
     * Check if master data (model/view) is available
     */
    public function exists(string $type, string $path = 'pages.master-data'): bool
    {

        $viewPath = $path . '.' . $type . '.index';

        if (View::exists($viewPath)) {
            return true;
        }

        $modelClass = 'App\\Models\\' . Str::studly($type);
        return class_exists($modelClass);
    }


       /**
     * Dapatkan instance model berdasarkan type
     */
    public function getModel(string $type): ?Model
    {
        $modelClass = 'App\\Models\\' . Str::studly($type);

        if (!class_exists($modelClass)) {
            return null;
        }

        return new $modelClass();
    }


      /**
     * Ambil rules validasi berdasarkan mode (create / update)
     */
    public function getValidationRules(Model $model, string $mode = 'create', $id = null): array
    {
        if (property_exists($model, 'rules')) {
            // Jika rules diset dengan mode terpisah
            if (isset($model->rules[$mode])) {
                $rules = $model->rules[$mode];
            } else {
                $rules = $model->rules;
            }

            // Replace {id} placeholder agar validasi unique bisa fleksibel untuk update
            foreach ($rules as $key => &$rule) {
                if (is_string($rule)) {
                    $rule = str_replace('{id}', $id ?? 'NULL', $rule);
                }
            }

            return $rules;
        }

        return [];
    }


      /**
     * Proses pembuatan data (CREATE)
     */
    public function create(string $type, array $data)
    {
        $model = $this->getModel($type);

        if (!$model) {
            throw new Exception("Model untuk '{$type}' tidak ditemukan");
        }

        $data = $this->generateSpecialFields($model, $data);

        // Validasi
        $rules = $this->getValidationRules($model, 'create');
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return ['success' => false, 'error' => $validator->errors()->first()];
        }

        $created = $model->create($data);
        return ['success' => true, 'data' => $created];
    }


     /**
     * Generate kolom otomatis seperti code, uuid, slug, dsb
     */
    protected function generateSpecialFields(Model $model, array $data, bool $isUpdate = false): array
    {
        // Jika model punya properti $autoGenerate, kita proses di sini
        if (property_exists($model, 'autoGenerate')) {
            foreach ($model->autoGenerate as $field => $callback) {
                // Skip jika update dan field sudah ada (tidak diubah)
                if ($isUpdate && isset($data[$field])) {
                    continue;
                }

                if (method_exists($model, 'generateCustomCode')) {
                    $data[$field] = $model->generateCustomCode();
                }
            }
        }

        return $data;
    }
}
