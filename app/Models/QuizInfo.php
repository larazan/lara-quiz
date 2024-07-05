<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Support\Str;

class QuizInfo extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'type_id',
        'category_id',
        'level_id',
        'title',
        'slug',
        'image',
        'description',
        'rule',
        'status',
    ];

    public const UPLOAD_DIR = 'uploads/quizzes';
    public const ORIGINAL = '135x75';

    public static function boot() {
        parent::boot();
        // Auto generate UUID when creating data User
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

     /**
     * Kita override getIncrementing method
     *
     * Menonaktifkan auto increment
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Kita override getKeyType method
     *
     * Memberi tahu laravel bahwa model ini menggunakan primary key bertipe string
     */
    public function getKeyType()
    {
        return 'string';
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function scopeTypeFilter($query, $act)
    {
        return $query->where(['type_id' => function($q)use($act){
            $q->from('types')->where('act', $act)->select('id');
        }]);
    }

    public function scopeQuizInfoLists($query, $act, $order = 'asc')
    {
        $query->whereHas('type', function ($query) use($act) {
            $query->where('act', $act);
        })->orderBy('level_id', $order)->active();
    }

    public function scopeTypeCheck($query, $act)
    {
        $query->whereHas('type', function ($q) use($act) {
            $q->where('act', $act);
        });
    }

    public function scopeQuestionCount($query, $act)
    {
        $query->withCount(['questions' => function ($question) use($act) {
            $question->whereHas('quizInfos', function ($quizInfo) use($act){
                $quizInfo->whereHas('type', function ($q) use($act) {
                    $q->where('act', $act);
                });
            });
        }]);
    }

}
