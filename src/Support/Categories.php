<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Support;

use Illuminate\Support\Collection;

class Categories
{
    public static function buildTree(Collection $categories): Collection
    {
        return $categories
            ->sortBy('name')
            ->where('parent', '=', 0)
            ->where('visible', '=', 1)
            ->mapWithKeys(function ($item) use ($categories) {
                $children = $categories
                    ->where('parent', '=', $item->id)
                    ->where('visible', '=', 1)
                    ->sortBy('name')
                    ->pluck('name', 'id')
                    ->toArray();

                return [
                    $item->id => [
                        'name' => $item->name,
                        'children' => $children,
                    ],
                ];
            });
    }
}
