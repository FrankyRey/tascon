<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RolePermission extends Model
{
    use HasFactory;

    protected $table = 'role_persmission';

    public function permissions(): BelongsTo
    {
        return $this->belongsTo(Permission::class, 'permission');
    }

    public function roles(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role');
    }
}
