<?php

namespace NetworkRailBusinessSystems\LaravelMoodle\Tests\Factories;

use NetworkRailBusinessSystems\LaravelMoodle\DataTransferObjects\FileObject as MoodleFileObject;

class FileObject extends MoodleFactory
{
    public function makeOne(): MoodleFileObject
    {
        return new MoodleFileObject([
            'filename' => $this->faker->word(),
            'filepath' => $this->faker->filePath(),
            'filesize' => $this->faker->randomNumber(),
            'fileurl' => $this->faker->url(),
            'isexternalfile' => $this->faker->boolean(),
            'mimetype' => $this->faker->mimeType(),
            'timemodified' => $this->faker->unixTime(),
        ]);
    }
}
