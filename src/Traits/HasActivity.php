<?php

namespace NRBusinessSystems\LaraMoodle\Traits;

trait HasActivity
{
    /**
     * @return bool
     */
    public function hasPage()
    {
        return $this->modname === 'page';
    }

    /**
     * @return string
     */
    public function hasScorm()
    {
        return $this->modname === 'scorm';
    }

    /**
     * @return mixed|null
     */
    public function getActivityId()
    {
        if($this->url) {
            parse_str(parse_url($this->url)['query'], $query);
            return $query['id'];
        }

        return null;
    }
}
