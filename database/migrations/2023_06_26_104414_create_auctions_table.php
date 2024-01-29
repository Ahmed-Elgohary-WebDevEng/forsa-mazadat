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
        Schema::enableForeignKeyConstraints();
        Schema::create('auctions', function (Blueprint $table) {
            $table->id();
            $table->enum('Region', ['all','riyadh', 'makka','almadina','alsharqia','aljuof','tabuk','haael','qassim','najran','jazan','albaha','shmaleah','asser'])->default('all');
            $table->enum('type', ['online', 'onsite','mixed'])->default('online');
            $table->enum('ShowInfath', ['yes', 'no'])->default('no');
            $table->string('Title');
            $table->string('image');
            $table->string('link');
            $table->string('onsiteLink')->nullable();
            $table->string('PlatformName')->nullable();
            $table->string('PlatformImage')->nullable();
            $table->string('description');
            $table->date('dateOfStarting');
            $table->time('timeOfStarting');
           // $table->time('timeOfEnding ');
            $table->date('dateOfEnding');
            $table->dateTime('nowdate');
            $table->string('slug')->nullable();

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
        Schema::dropIfExists('auctions');
    }
};
