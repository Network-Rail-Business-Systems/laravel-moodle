<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\Exceptions\MoodleException;
use NetworkRailBusinessSystems\LaravelMoodle\Facades\LaravelMoodle;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

class PageTest extends TestCase
{
    public function test_view_page_event()
    {
        Http::fake([
            '*' => Http::response(
                [
                    'status' => true,
                    'warnings' => [],
                ],
                200
            ),
        ]);

        session(['moodle-token' => 'ABC123']);

        $this->assertTrue(LaravelMoodle::viewPageEvent(1));
    }

    public function test_unsuccessful_page_view_event()
    {
        $this->expectException(MoodleException::class);

        Http::fake([
            '*' => Http::response(
                [
                    'exception' => 'invalid_parameter_exception',
                    'errorcode' => 'invalidparameter',
                    'message' => 'Invalid parameter value detected (Missing required key in single structure: pageid)',
                ],
                200
            ),
        ]);

        session(['moodle-token' => 'ABC123']);

        LaravelMoodle::viewPageEvent(1);
    }
}
