<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;

class BadgeTest
{
    public function test_get_badges()
    {
        Http::fake([]);
    }
}
