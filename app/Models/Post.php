<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'extract',
        'content',
        'commentable',
        'is_public',
        'expires',
        'user_id'
    ];

    protected $casts = [
        'commentable' => 'boolean',
        'is_public' => 'boolean',
        'expires' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
