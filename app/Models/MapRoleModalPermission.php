<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MapRoleModalPermission extends Model
{
    protected $fillable = [
        'role_id',
        'modal_id',
        'permission_id',
        'is_active',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public function modal()
    {
        return $this->belongsTo(Modal::class);
    }
    public function permission()
    {
        return $this->belongsTo(Permission::class); 
    }
}
