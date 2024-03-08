<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coulie extends Model
{
    use HasFactory;


    protected $table = 'coulies';
    protected $primaryKey = 'id';
    protected $fillable =[
        'code',
        'agence_id'
    ];

    public function agence()
    {
        return $this->belongsTo(Agence::class);
    }

}
