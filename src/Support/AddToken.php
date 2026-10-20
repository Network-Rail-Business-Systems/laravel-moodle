<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Support;

use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class AddToken
{
    private string $token;

    public function __construct()
    {
        $this->token = MoodleToken::get();
    }

    public function toImages(string $content): Stringable
    {
        return Str::of($content)->replace(
            ['.png', '.PNG', '.jpg', '.JPG'],
            [
                '.png?token='.$this->token,
                '.PNG?token='.$this->token,
                '.jpg?token='.$this->token,
                '.JPG?token='.$this->token,
            ]
        );
    }

    public function toUrl(string $url): string
    {
        return $url.'?token='.$this->token;
    }
}
