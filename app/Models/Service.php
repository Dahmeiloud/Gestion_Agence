<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $fillable= [

        'agence_id',
        'client_id',


        ] ;


    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


}
