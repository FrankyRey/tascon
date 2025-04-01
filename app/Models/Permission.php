<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permission';

    protected $fillable = [
        'name',
        'rbac_name',
        'description'
    ];

    public function rolesPermission(): HasMany
    {
        return $this->hasMany(RolePermission::class, 'permission');
    }
}
