<?php

namespace NetworkRailBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaraMoodle\Exceptions\MoodleException;
use NetworkRailBusinessSystems\LaraMoodle\Facades\LaraMoodle;
use NetworkRailBusinessSystems\LaraMoodle\Tests\TestCase;

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

        $this->assertTrue(LaraMoodle::viewPageEvent(1));
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

        LaraMoodle::viewPageEvent(1);
    }
}
