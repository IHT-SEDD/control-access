<?php

namespace App\Services;

use App\Enums\MasterStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Role;

class SelectOptionService
{
  protected int $limit = 100;

  public function getOptions(string $option, ?string $search = null, array $with = [])
  {
    $map = [
      'tower' => [\App\Models\Tower::class, true],
    ];

    if (!isset($map[$option])) {
      return collect();
    }

    [$model, $filterActive] = $map[$option];

    return $this->buildQuery($model, $filterActive, $search, $with)->get();
  }

  protected function buildQuery(string $model, bool $filterActive, ?string $search = null, array $with = []): Builder
  {
    $instance = new $model;
    $table = $instance->getTable();

    $select = ['id', 'name as text'];

    foreach ($with as $relation) {
      $fk = "{$relation}_id";
      if (Schema::hasColumn($table, $fk)) {
        $select[] = $fk;
      }
    }

    $query = $model::query()->select($select);

    if (!empty($with)) {
      $query->with($with);
    }

    if ($filterActive && Schema::hasColumn($table, 'is_active')) {
      $query->where('is_active', MasterStatus::Active);
    }

    if ($search) {
      $query->where('name', 'like', "%{$search}%");
    }

    return $query->limit($this->limit);
  }
}
