<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Responden extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = [
        "group",
        "pertanyaan",
        "jawaban",
        "question_id"
    ];

    public function question(): BelongsTo{
        return $this->belongsTo(Question::class);
    }
}
