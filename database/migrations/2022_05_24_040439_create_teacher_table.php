<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('email')->unique();
            $table->String('password');
            $table->String('phone');
            $table->String('image');
            $table->String('idfront');
            $table->String('idback');
            $table->String('balance')->nullable();
            $table->String('idstatus')->default('false');
            $table->String('teststatus')->default('false');
            $table->String('interviewstatus')->default('false');
            $table->String('admin_id')->default('1');
            $table->date('interviewdate')->nullable();
            $table->String('bio');
            $table->integer('hourlyrate');
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
        Schema::dropIfExists('teacher');
    }
}