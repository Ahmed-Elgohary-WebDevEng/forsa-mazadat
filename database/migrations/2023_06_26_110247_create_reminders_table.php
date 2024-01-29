<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
       
            $table->bigIncrements('id');
            $table->string('Fullname');
            $table->unsignedBigInteger('Acution_id');
            $table->string('mobile_no');
            $table->string('timezoneoffset');
            $table->string('slug');
            $table->text('message');
            $table->foreign('Acution_id')->references('id')->on('auctions')->onDelete('cascade');

            $table->timestamps();

        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reminders');
    }
};
