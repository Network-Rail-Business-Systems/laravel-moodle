<?php

namespace NRBusinessSystems\LaraMoodle\Traits;

trait HasCourseImages
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getImages()
    {
        $images = collect();

        if($this->overviewfiles) {
            $images = collect($this->overviewfiles)
                ->filter(function($item) {
                    return $item->mimetype === 'image/png' || $item->mimetype === 'image/jpg';
            });
        }

        return $images;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->getImages()->first();
    }
}
