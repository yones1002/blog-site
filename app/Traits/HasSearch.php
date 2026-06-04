<?php

namespace App\Traits;

trait HasSearch
{
    /**
     * @param $query
     * @param string|null $search
     * @return mixed
     */
    public function scopeSearch($query, ?string $search): mixed
    {
        if (!$search) {
            return $query;
        }

        return $query->where(function ($q) use ($search) {
            foreach ($this->searchable ?? [] as $field) {
                $q->orWhere($field, 'like', "%{$search}%");
            }
        });
    }
}
