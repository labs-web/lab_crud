<?php

namespace App\Models\GestionProjets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom' ,
        'description',    
    ];
   
    public function projets()
    {
        return $this->belongsToMany(Projet::class, 'tags_projets', 'tag_id', 'projet_id');
    }
}

