<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdaptationScaleWsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adaptation_scale_ws', function (Blueprint $table) {
            $table->string('w_scale_id')->primary();
            $table->string('user_id');
            $table->integer('q1');
            $table->integer('q2');
            $table->integer('q3');
            $table->integer('q4');
            $table->integer('q5');
            $table->integer('q6');
            $table->integer('q7');
            $table->integer('q8');
            $table->integer('q9');
            $table->integer('q10');
            $table->dateTime('write_datetime');

            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adaptation_scale_ws');
    }
}
