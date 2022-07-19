<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('national_id')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('address')->nullable();
            $table->string('picture')->nullable();
            $table->string('status')->nullable();
            $table->date('birth_date')->nullable();
            $table->enum('gender',['male','female'])->nullable();
            $table->bigInteger('phone')->nullable();
            $table->bigInteger('mobile')->nullable();
            $table->bigInteger('emergency')->nullable();
            $table->string('medical_degree')->nullable();
            $table->string('specialist')->nullable();
            $table->string('biography')->nullable();
            $table->string('educational_qualification')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('blood_pressure')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
