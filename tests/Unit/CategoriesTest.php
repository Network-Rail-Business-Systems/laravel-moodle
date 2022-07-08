<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NetworkRailBusinessSystems\LaravelMoodle\Facades\LaravelMoodle;
use NetworkRailBusinessSystems\LaravelMoodle\Support\Categories;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\Stubs\MockResponses;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

class CategoriesTest extends TestCase
{
    public function test_build_tree()
    {
        Http::fake([
            '*' => Http::response(MockResponses::categories()),
        ]);
        session(['moodle-token' => 'ABC123']);

        $categories = LaravelMoodle::getCategories();

        $this->assertEquals(
            [
                '1' => [
                    'name' => 'Miscellaneous',
                    'children' => [],
                ],
                '2' => [
                    'name' => 'Web Systems',
                    'children' => [
                        '3' => 'Business Briefing System',
                    ],
                ],
            ],
            Categories::buildTree($categories)->toArray()
        );
    }
}
