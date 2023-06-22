<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudient extends Model
{
    use HasFactory;


    protected $fillable = [
        'nom',
        'adresse',
        'email',
        'phone',
        'datenaissance',
        'ville_id',
        'user_id'
       ];

    public function etudientHasVille(){
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }

    public function articles()
    {
        return $this->hasMany('App\Models\Article','user_id','user_id');
    }

    public function documents()
    {
        return $this->hasMany('App\Models\Document','user_id','user_id');
    }

}
