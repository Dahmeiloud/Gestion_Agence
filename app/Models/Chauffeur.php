<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chauffeur extends Model
{
    use HasFactory;


    protected $table = 'chauffeurs';
    protected $primaryKey = 'id';
    protected $fillable = [ 'nom', 'Numero_telephone','code','agence_id' ] ;


    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

}
