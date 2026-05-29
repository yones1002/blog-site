<?php

namespace App\Traits;

trait HasSearch
{
    public function scopeSearch($query, ?string $search)
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
