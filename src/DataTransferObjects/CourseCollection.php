<?php

namespace NRBusinessSystems\LaraMoodle\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObjectCollection;

/**
 * Class CourseCollection
 * @package NRBusinessSystems\LaraMoodle\DataTransferObjects
 * @method \NRBusinessSystems\LaraMoodle\DataTransferObjects\Course
 */
class CourseCollection extends DataTransferObjectCollection
{
    public function current(): \NRBusinessSystems\LaraMoodle\DataTransferObjects\Course
    {
        return parent::current();
    }

    public static function create(array $data): CourseCollection
    {
        return new static(Course::arrayOf($data));
    }
}
