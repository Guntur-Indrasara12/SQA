<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait HasQueryFilters
{
    public function scopeApplyFilters($query, Request $request, array $allowedFilters = [])
    {
        foreach ($request->input('filter', []) as $field => $value) {
            if (in_array($field, $allowedFilters)) {
                $query->where($field, 'like', "%$value%");
            }
        }

        // Sorting
        $sort = $request->input('sort');
        $direction = $request->input('direction', 'asc');
        if ($sort && in_array($sort, $allowedFilters)) {
            $query->orderBy($sort, $direction);
        }

        return $query;
    }
}
