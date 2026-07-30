<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\Facades\LaravelMoodle;
use NetworkRailBusinessSystems\LaravelMoodle\Mocks\MockResponses;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

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
        $categories = LaravelMoodle::getCategories();

        $this->assertNotNull($categories);
        $this->assertEquals('Miscellaneous', $categories[0]->name);
    }

    public function test_search_categories()
    {
        $categories = LaravelMoodle::searchCategories('misc');

        $this->assertNotNull($categories);
        $this->assertEquals('Miscellaneous', $categories[0]->name);
    }
}
