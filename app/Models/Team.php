<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'personal_team',
    ];

    protected function casts(): array
    {
        return [
            'personal_team' => 'boolean',
        ];
    }
}
