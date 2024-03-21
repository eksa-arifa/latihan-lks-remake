<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Form extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        "title",
        "description",
        "user_id",
        "slug"
    ];


    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function question(): HasMany{
        return $this->hasMany(Question::class);
    }
}
