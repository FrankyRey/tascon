<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VersionControl extends Model
{
    use HasFactory;

    protected $table = 'version_control';

    protected $fillable = [
        'task',
        'content',
        'version'
    ];

    protected $casts = [
        'version' => 'timestamp'
    ];

    public function versionTask(): BelongsTo
    {
        return $this->belongsTo(Task::class, 'task');
    }
}
