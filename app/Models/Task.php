<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Ramsey\Uuid\Uuid;

class Task extends Model
{
    protected static function booted()
    {
        static::creating(
            fn(Task $task) => ($task->id = (string) Uuid::uuid4()),
        );
    }

    public function priorities(): BelongsTo
    {
        return $this->belongsTo(Priority::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
