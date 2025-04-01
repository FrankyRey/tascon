<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'permission';

    protected $fillable = [
        'name',
        'active',
        'parent'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function rolesPermission(): HasMany
    {
        return $this->hasMany(RolePermission::class, 'role');
    }

    public function userRole(): HasMany
    {
        return $this->hasMany(UserRole::class, 'role');
    }

    public function childRole(): HasMany
    {
        return $this->hasMany(Role::class, 'parent');
    }

    public function parentRole(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'parent');
    }
}
