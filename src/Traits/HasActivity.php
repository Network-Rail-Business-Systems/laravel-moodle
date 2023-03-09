<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Traits;

trait HasActivity
{
    public function hasPage(): bool
    {
        return $this->modname === 'page';
    }

    public function hasScorm(): bool
    {
        return $this->modname === 'scorm';
    }

    public function getActivityId(): mixed
    {
        if ($this->url) {
            parse_str(parse_url($this->url)['query'], $query);

            return $query['id'];
        }

        return null;
    }
}
