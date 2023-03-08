<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Traits;

trait HasCustomFields
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getCustomFields()
    {
        $customFields = collect();

        if ($this->customfields) {
            $customFields = collect($this->customfields)->pluck('value', 'shortname');
        }

        return $customFields;
    }

    /**
     * @return string|null
     */
    public function getCustomField(string $shortname)
    {
        return $this->getCustomFields()[$shortname] ?? null;
    }
}
