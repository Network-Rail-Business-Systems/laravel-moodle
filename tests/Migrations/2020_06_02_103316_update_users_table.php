<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('name');
            $table->string('email');
            $table->timestamps();
            $table->string('password')->nullable();
            $table->string('username')->nullable()->unique();
            $table->unsignedBigInteger('moodle_id')->nullable();
        });
    }

    public function down(): void
    {
        //
    }
};
