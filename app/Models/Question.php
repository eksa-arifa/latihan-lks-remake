<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        "question",
        "type",
        "form_id"
    ];


    public function form(): BelongsTo{
        return $this->belongsTo(Form::class);
    }

    public function answer(): HasMany{
        return $this->hasMany(Answer::class);
    }

    public function responden(): HasMany{
        return $this->hasMany(Responden::class);
    }
}
