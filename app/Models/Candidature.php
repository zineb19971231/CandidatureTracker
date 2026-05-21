<?php

namespace App\Models;
use App\Models\Entretien;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Candidature extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'nom_entreprise',
        'poste',
        'url_offre',
        'statut',
        'priorite',
        'notes',
        'date_candidature',
    ];
    
    public function entretiens()
    {
        return $this->hasMany(Entretien::class);
    }
}
