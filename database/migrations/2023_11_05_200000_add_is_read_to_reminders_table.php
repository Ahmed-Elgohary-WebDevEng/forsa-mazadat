<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsReadToRemindersTable extends Migration
{
    public function up()
    {
        Schema::table('reminders', function (Blueprint $table) {
            $table->boolean('is_sent')->default(false);
        });
    }

    public function down()
    {
        Schema::table('reminders', function (Blueprint $table) {
            $table->dropColumn('is_sent');
        });
    }
}
