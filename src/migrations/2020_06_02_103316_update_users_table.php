<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table
                ->string('password')
                ->nullable()
                ->change();

            $table
                ->string('username')
                ->unique()
                ->nullable()
                ->after('email');

            $table
                ->unsignedBigInteger('moodle_id')
                ->nullable()
                ->after('username');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->change();
            $table->dropColumn('username');
            $table->dropColumn('moodle_id');
        });
    }
}
