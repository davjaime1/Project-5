<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('small', 1000);
            $table->string('big', 1000);
            $table->string('section1', 1000);
            $table->string('section2', 1000);
            $table->string('section3', 1000);
            $table->string('section4', 1000);
            $table->string('section5', 1000);
            $table->string('section6', 1000);
            $table->string('page');
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
        Schema::dropIfExists('pages');
    }
}
