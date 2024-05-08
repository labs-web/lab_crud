<?php

namespace App\Models\GestionProjets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionProjets\Task;

class Projet extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom' ,
        'description',
        'date_debut',
        'date_de_fin',
        
    ];
   
}

