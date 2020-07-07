<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Unit;

use Illuminate\Support\Facades\Http;
use NRBusinessSystems\LaraMoodle\Facades\LaraMoodle;
use NRBusinessSystems\LaraMoodle\Support\Categories;
use NRBusinessSystems\LaraMoodle\Tests\Stubs\MockResponses;
use NRBusinessSystems\LaraMoodle\Tests\TestCase;

class CategoriesTest extends TestCase
{
    public function test_build_tree()
    {
        Http::fake([
            '*' => Http::response(MockResponses::categories()),
        ]);
        session(['moodle-token' => 'ABC123']);

        $categories = LaraMoodle::getCategories();

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
