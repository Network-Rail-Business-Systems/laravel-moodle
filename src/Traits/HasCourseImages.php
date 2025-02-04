<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Traits;

use Illuminate\Support\Collection;

trait HasCourseImages
{
    public function getImages(): Collection
    {
        $images = collect();

        if ($this->overviewfiles) {
            $images = collect($this->overviewfiles)->filter(function ($item) {
                return $item->mimetype === 'image/png' ||
                    $item->mimetype === 'image/jpg' ||
                    $item->mimetype === 'image/jpeg';
            });
        }

        return $images;
    }

    public function getImage(): mixed
    {
        return $this->getImages()->first();
    }
}
