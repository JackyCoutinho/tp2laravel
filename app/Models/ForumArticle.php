<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForumArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
        'langue_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function langue()
    {
        return $this->belongsTo(Langue::class, 'langue_id');
    }

    public function forumHasUser(){
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function forumHasLangue(){
        return $this->hasOne('App\Models\Langue', 'id', 'langue_id');
    }
}
