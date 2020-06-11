<?php

namespace NRBusinessSystems\LaraMoodle\Tests\Unit;

use NRBusinessSystems\LaraMoodle\Exceptions\MoodleTokenMissingException;
use NRBusinessSystems\LaraMoodle\Facades\AddToken;
use NRBusinessSystems\LaraMoodle\Tests\TestCase;

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
     * @param $content
     * @param $expected
     * @dataProvider images
     */
    public function test_add_token_to_images($content, $expected)
    {
        $this->assertEquals($expected, AddToken::toImages($content));
    }

    public function images()
    {
        return [
            'jpg' => [
                'test.jpg',
                'test.jpg?token=ABC123'
            ],
            'png' => [
                'test.png',
                'test.png?token=ABC123'
            ]
        ];
    }
}
