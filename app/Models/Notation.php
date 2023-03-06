<?php

namespace App\Models;

use App\Models\Biere;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notation extends Model
{
    use HasFactory;
    protected $fillable = [
        'note',
        'add_at',
        "user_id",
        "biere_id"
    ];
    public function biere() {
        return $this->belongsTo('App\Biere');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }

}
