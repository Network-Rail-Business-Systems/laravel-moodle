<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Unit;

use NRBusinessSystems\LaraMoodle\Exceptions\MoodleTokenMissingException;
use NRBusinessSystems\LaraMoodle\Facade as LaraMoodle;
use NRBusinessSystems\LaraMoodle\Tests\TestCase;

class FacadeTest extends TestCase
{
    public function test_throws_exception_without_token()
    {
        $this->expectException(MoodleTokenMissingException::class);

        LaraMoodle::getCourses();
    }
}
