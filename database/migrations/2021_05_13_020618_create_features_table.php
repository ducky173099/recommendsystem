<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('feature_name');
            $table->integer('polyester');
            $table->integer('hood');
            $table->integer('zipper');
            $table->integer('mint-blue');
            $table->integer('mild-weather');
            $table->integer('fleece');
            $table->integer('white');
            $table->integer('pink');
            $table->integer('cold-weather');
            $table->integer('windproof');
            $table->integer('water-resistant');
            $table->integer('blue');
            $table->integer('gray');
            $table->integer('half-zipper');
            $table->integer('brown');
            $table->integer('purple');
            $table->integer('high-collar');
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
        Schema::dropIfExists('features');
    }
}
