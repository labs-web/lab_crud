<?php

namespace App\Models\GestionProjets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionProjets\Tag;


class Projet extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'nom' ,
        'description',    
    ];
   
   
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'projet_tags')->withTimestamps();
    }
}

