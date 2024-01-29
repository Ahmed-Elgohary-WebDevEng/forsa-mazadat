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
        Schema::create('acution_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Acution_id');
            $table->string('location')->nullable();
            $table->string('name');
            $table->string('descripton')->nullable();
            $table->string('space')->nullable();
            $table->double('maxPrice')->nullable();
            $table->double('lowPrice')->nullable();
            $table->string('width')->nullable();
            $table->string('length')->nullable();
            $table->string('slug');

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
        Schema::dropIfExists('acution_items');
    }
};
