<?php

namespace NetworkRailBusinessSystems\LaraMoodle\Traits;

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
     * @param string $shortname
     * @return string|null
     */
    public function getCustomField(string $shortname)
    {
        return $this->getCustomFields()[$shortname] ?? null;
    }
}
