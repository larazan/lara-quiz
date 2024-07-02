<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionQuizInfo extends Model
{
    use HasFactory;

    protected $table = 'question_quiz_info';

    protected $fillable = [
        'question_id',
        'quiz_info_id',
    ];

    public function quizInfos()
    {
        return $this->belongsTo(QuizInfo::class, 'quiz_info_id', 'id');
    }
}
