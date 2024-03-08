<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trajet extends Model
{
    use HasFactory;


    protected $table = 'trajets';
    protected $primaryKey = 'id';
    protected $fillable =['lieu_departe','lieu_arivee','adresse','agence_id'];
}
