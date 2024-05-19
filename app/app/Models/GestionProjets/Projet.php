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
   
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tags_projets', 'projet_id', 'tag_id');
    }
}

