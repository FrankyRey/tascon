<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'user_role';

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function roles(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role');
    }
}
