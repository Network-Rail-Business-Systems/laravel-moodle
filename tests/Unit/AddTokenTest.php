<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit;

use NetworkRailBusinessSystems\LaravelMoodle\Exceptions\MoodleTokenMissingException;
use NetworkRailBusinessSystems\LaravelMoodle\Facades\AddToken;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;

class AddTokenTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        session(['moodle-token' => 'ABC123']);
    }

    public function test_no_moodle_token()
    {
        session()->forget('moodle-token');

        $this->expectException(MoodleTokenMissingException::class);

        AddToken::toImage('test');
    }

    /**
     * @dataProvider images
     */
    public function test_add_token_to_images($content, $expected)
    {
        $this->assertEquals($expected, AddToken::toImages($content));
    }

    public function images()
    {
        return [
            'jpg' => ['test.jpg', 'test.jpg?token=ABC123'],
            'png' => ['test.png', 'test.png?token=ABC123'],
            'PNG' => ['test.PNG', 'test.PNG?token=ABC123'],
            'JPG' => ['test.JPG', 'test.JPG?token=ABC123'],
        ];
    }

    public function test_add_token_to_url()
    {
        $this->assertEquals(
            'http://moodle.test/download/spreadsheet.xlsx?token=ABC123',
            AddToken::toUrl('http://moodle.test/download/spreadsheet.xlsx')
        );
    }
}
