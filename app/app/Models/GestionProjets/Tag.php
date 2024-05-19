<?php

namespace App\Models\GestionProjets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionProjets\Projet;

class Tag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom' ,
        'description',    
    ];
   
   
    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'projet_tags')->withTimestamps();
    }
}

