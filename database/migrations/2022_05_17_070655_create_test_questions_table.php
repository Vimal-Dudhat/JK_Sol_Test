<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_questions', function (Blueprint $table) {
            $table->id();
            $table->integer('question_mode')->nullable()->comment('1 = Very Easy, 2 = Easy, 3 = Medium, 4 = Hard, 5 = Very Hard');
            $table->string('question')->nullable();
            $table->longText('question_code')->nullable();
            $table->longText('question_img')->nullable();
            $table->integer('answer_type')->nullable()->comment('1 = Options, 2 = Write');
            $table->integer('answer_input_mode')->nullable()->comment('1 = Number, 2 = Text');
            $table->text('op_1')->nullable();
            $table->text('op_2')->nullable();
            $table->text('op_3')->nullable();
            $table->text('op_4')->nullable();
            $table->text('answer')->nullable();
            $table->text('q_solution')->nullable();
            $table->tinyInteger('is_active')->nullable();
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
        Schema::dropIfExists('test_questions');
    }
}
