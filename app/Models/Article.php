<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content_fr',
        'content_en',
        'user_id'
    ];

    public function articleHasUser(){
        return $this->hasOne('App\Models\Etudient', 'user_id', 'user_id');
    }


}
