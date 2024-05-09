<?php

namespace App\Models\GestionProjets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom' ,
        'description',    
    ];
   
}

