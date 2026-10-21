<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Unit;

use NetworkRailBusinessSystems\LaravelMoodle\Exceptions\MoodleTokenMissingException;
use NetworkRailBusinessSystems\LaravelMoodle\Facades\AddToken;
use NetworkRailBusinessSystems\LaravelMoodle\Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class AddTokenTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        config([
            'laravel-moodle.admin_token' => 'ABC123',
        ]);
    }

    public function test_no_moodle_token(): void
    {
        config([
            'laravel-moodle.admin_token' => null,
        ]);

        $this->expectException(MoodleTokenMissingException::class);

        AddToken::toImages('test.png');
    }

    #[DataProvider('images')]
    public function test_add_token_to_images(
        string $content,
        string $expected,
    ): void {
        $this->assertEquals(
            $expected,
            AddToken::toImages($content),
        );
    }

    public static function images(): array
    {
        return [
            'jpg' => ['test.jpg', 'test.jpg?token=ABC123'],
            'png' => ['test.png', 'test.png?token=ABC123'],
            'PNG' => ['test.PNG', 'test.PNG?token=ABC123'],
            'JPG' => ['test.JPG', 'test.JPG?token=ABC123'],
        ];
    }

    public function test_add_token_to_url(): void
    {
        $this->assertEquals(
            'http://moodle.test/download/spreadsheet.xlsx?token=ABC123',
            AddToken::toUrl('http://moodle.test/download/spreadsheet.xlsx'),
        );
    }
}
