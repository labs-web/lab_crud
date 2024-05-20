<?php

namespace App\Models\GestionTasks;

use App\Models\GestionProjets\Projet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $fillable = [
            'id'  ,
            'nom'  ,
            'description'  ,
            'project_id'  ,
            'created_at'  ,
            'updated_at'  ,
        ];

    public function project()
    {
        return $this->belongsTo(Projet::class,'project_id');
    }
}