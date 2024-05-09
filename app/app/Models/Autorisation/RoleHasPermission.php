<?php

namespace App\Models\Autorisation;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class RoleHasPermission extends Model
{
    public $timestamps = false;
    protected $table = 'role_has_permissions';
    protected $primaryKey = ['permission_id', 'role_id'];
    public $incrementing = false;
    protected $fillable = [
        'permission_id',
        'role_id'
    ];


    public function roleRelation()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function permissionRelations()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }

}
