<?php

namespace App\Models;
use Carbon\Carbon;
namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'commentaire',
        'add_at',
    ];
    public function biere() {
        return $this->belongsTo('App\Biere');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
    public static function diff(Commentaire $commentaire) {
        $dt = Carbon::now();
        $dc = Carbon::instance(new \DateTime($commentaire->add_at));
        return $dc->diffForHumans($dt);
    }
    public function __toString()
        {
            return sprintf("id: %d titre: %s commentaire: %s biere: %s user: %s",
                $this->id,
                $this->titre,
                $this->commentaire,
                $this->biere->nom,
                $this->user->name
            );
        }
    }
