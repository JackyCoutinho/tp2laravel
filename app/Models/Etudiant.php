<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'phone',
        'email',
        'datedenaissance',
        'ville_id',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
