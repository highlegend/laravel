<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_fr',
        'title_en',
        'format',
        'user_id'
    ];

    public function documentHasUser(){
        return $this->hasOne('App\Models\Etudient', 'user_id', 'user_id');
    }

}
