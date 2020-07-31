<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\Facades\LaraMoodle;
use NRBusinessSystems\LaraMoodle\Tests\Stubs\CalendarResponses;
use NRBusinessSystems\LaraMoodle\Tests\TestCase;

class CalendarTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        session(['moodle-token' => 'ABC123']);
    }

    public function test_get_calendar_monthly_view()
    {
        Http::fake([
            '*' => Http::response(CalendarResponses::calendarResponse(), 200),
        ]);

        $calendar = LaraMoodle::calendarMonthlyView('2020', '8', 1);

        $this->assertNotNull($calendar);
        $this->assertEquals('month', $calendar->view);
        $this->assertEquals('August 2020', $calendar->periodname);
        $this->assertCount(1, $calendar->weeks);
        $this->assertCount(2, $calendar->weeks[0]->days);
        $this->assertEquals('Classroom Attendance', $calendar->weeks[0]->days[1]->events[0]->name);
    }
}
