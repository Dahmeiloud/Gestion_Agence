<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;


    protected $table = 'buses';
    protected $primaryKey = 'id';
    protected $fillable= [
        'Matricule',
        'code',
        'agence_id',
        'chauffeur_id'

        ] ;

        public function agence()
{
    return $this->belongsTo(Agence::class);
}

public function chauffeur()
{
    return $this->belongsTo(Chauffeur::class);
}


}
