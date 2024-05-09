<?php

namespace App\Models;

use App\Models\Autorisation\Permission;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasPermissions;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory, HasPermissions;


    protected $fillable = [
        'name' ,
        'guard_name'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_has_permissions', 'role_id', 'permission_id');
    }

}
