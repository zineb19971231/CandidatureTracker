<?php

namespace App\Models;
use App\Models\Entretien;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
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
