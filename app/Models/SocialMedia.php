<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $casts = [
        'status'        => 'integer',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];
    protected $table = 'social_medias';

    protected $guarded = [
		'id',
		'created_at',
		'updated_at',
	];
    
}
