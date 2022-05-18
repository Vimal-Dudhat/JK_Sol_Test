<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('user_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->text('address')->nullable();
            $table->string('education')->nullable();
            $table->string('skill')->nullable();
            $table->string('department')->nullable();
            $table->integer('time')->nullable();
            $table->integer('total_question')->nullable();
            $table->integer('test_type')->nullable()->comment('1 = Very Easy, 2 = Easy, 3 = Medium, 4 = Hard, 5 = Very Hard');
            $table->integer('status')->nullable()->comment('0 = Pending, 1 = Start, 2 = Compelete');
            $table->integer('result')->nullable();
            $table->text('resume')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('expected_salary')->nullable();
            $table->string('notice_period')->nullable();
            $table->string('total_Experience')->nullable();
            $table->tinyInteger('role')->nullable();
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
