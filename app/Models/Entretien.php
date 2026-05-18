<?php

namespace App\Models;
use App\Models\Candidature;

use Illuminate\Database\Eloquent\Model;

class Entretien extends Model
{
    protected $fillable = [
        'candidature_id',
        'date_entretien',
        'type_entretien',
        'resultat',
        'notes',
    ];
    
    public function candidature()
    {
        return $this->belongsTo(Candidature::class);
    }
}
