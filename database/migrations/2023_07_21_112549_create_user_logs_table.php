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
        Schema::create('user_logs', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->nullable();
            $table->string('Firstname');
            $table->string('lastname');
            $table->string('identity');
            $table->string('phone');
            $table->unsignedBigInteger('Acution_id');
            //$table->unsignedBigInteger('Webuser_id');


            $table->foreign('Acution_id')->references('id')->on('auctions')->onDelete('cascade');
           // $table->foreign('Webuser_id')->references('id')->on('website_users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_logs');
    }
};
