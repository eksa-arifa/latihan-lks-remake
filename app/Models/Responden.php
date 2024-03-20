<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responden extends Model
{
    use HasFactory, HasUuids;


    protected $fillable = [
        "group",
        "pertanyaan",
        "jawaban",
        "id_soal"
    ];
}
