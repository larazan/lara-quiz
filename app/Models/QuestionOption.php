<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'option',
        'is_answer',
        'image',
    ];

    public const UPLOAD_DIR = 'uploads/options';
    public const ORIGINAL = '135x75';

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
