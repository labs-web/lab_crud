<?php

namespace App\Models\GestionProjets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetTag extends Model
{
    use HasFactory;

    protected $table = 'projet_tags';
    protected $fillable = ['projet_id','tag_id'];

}