<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_mode',
        'question',
        'question_code',
        'question_img',
        'answer_type',
        'answer_input_mode',
        'op_1',
        'op_2',
        'op_3',
        'op_4',
        'answer',
        'q_solution',
        'is_active',
    ];
}
