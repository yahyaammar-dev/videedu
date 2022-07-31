<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroom extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classroom', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('bio');
            $table->String('classesperweek');
            $table->String('monthlyfees');
            $table->String('totalclasses');
            $table->String('image');
            $table->String('remarks')->nullable;
            $table->String('teacher_id');
            $table->String('link');
            $table->String('status')->default("false");
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
        Schema::dropIfExists('classroom');
    }
}
