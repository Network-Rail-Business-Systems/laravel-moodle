<?php

namespace NetworkRailBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaraMoodle\Facades\LaraMoodle;
use NetworkRailBusinessSystems\LaraMoodle\Tests\Stubs\MockResponses;
use NetworkRailBusinessSystems\LaraMoodle\Tests\TestCase;

class BadgeTest extends TestCase
{
    public function test_get_badges()
    {
        Http::fake([
            '*' => Http::response(MockResponses::badges(), 200),
        ]);

        session(['moodle-token' => 'ABC123']);

        $data = LaraMoodle::getBadges();

        $this->assertNotNull($data);
        $this->assertEquals('BBS Complete', $data->badges[0]->name);
        $this->assertEquals('Completed My First Course', $data->badges[0]->description);
    }
}
