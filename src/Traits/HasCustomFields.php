<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Traits;

use Illuminate\Support\Collection;

/**
 * @property ?array $customfields
 */
trait HasCustomFields
{
    public function getCustomFields(): Collection
    {
        if ($this->customfields !== null) {
            $customFields = new Collection($this->customfields);
            return $customFields->pluck('value', 'shortname');
        }

        return new Collection();
    }

    public function getCustomField(string $shortname): ?string
    {
        return $this->getCustomFields()[$shortname] ?? null;
    }
}
