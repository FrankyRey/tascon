<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Task extends Model
{
    use HasFactory;

    protected $table = 'task';

    protected $fillable = [
        'title',
        'description',
        'delete',
        'delete_date',
        'owner',
        'status',
    ];

    protected $casts = [
        'delete'      => 'boolean',
        'delete_date' => 'date',
    ];

    public function ownerUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner');
    }

    public function taskStatus(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status');
    }

    public function versions(): HasMany
    {
        return $this->hasMany(VersionControl::class, 'task');
    }
}
