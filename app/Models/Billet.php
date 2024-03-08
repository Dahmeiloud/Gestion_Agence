<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billet extends Model
{
    use HasFactory;



    protected $table = 'billets';
    protected $primaryKey = 'id';
    protected $fillable= [
        'code',
        'prix',
        'agence_id',
        'client_id',
        'trajet_id'

        ] ;


    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function trajet()
    {
        return $this->belongsTo(Trajet::class);
    }




}
