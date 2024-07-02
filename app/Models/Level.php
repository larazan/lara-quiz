<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'level'
    ];

    public function quizInfos()
    {
        return $this->hasMany(QuizInfo::class);
    }
}
