<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function impulses(): BelongsToMany
    {
        return $this->belongsToMany(Impulse::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function subtopics(): HasMany
    {
        return $this->hasMany(Topic::class, 'topic_id');
    }

}
