<?php

namespace NetworkRailBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaraMoodle\Facades\LaraMoodle;
use NetworkRailBusinessSystems\LaraMoodle\Tests\Stubs\MockResponses;
use NetworkRailBusinessSystems\LaraMoodle\Tests\TestCase;

class CategoryTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Http::fake([
            '*' => Http::response(MockResponses::categories(), 200),
        ]);

        session(['moodle-token' => 'ABC123']);
    }

    public function test_get_categories()
    {
        $categories = LaraMoodle::getCategories();

        $this->assertNotNull($categories);
        $this->assertEquals('Miscellaneous', $categories[0]->name);
    }

    public function test_search_categories()
    {
        $categories = LaraMoodle::searchCategories('misc');

        $this->assertNotNull($categories);
        $this->assertEquals('Miscellaneous', $categories[0]->name);
    }
}
