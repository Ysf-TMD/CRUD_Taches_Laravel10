<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biere extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function commentaires() {
        return $this->hasMany('App\Commentaire');
    }
    public function notations() {
        return $this->hasMany('App\Notation');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
}
