<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sorteio extends Model
{
    protected $fillable = [
        'id', 'data_sorteio', 'participantes', 'resultado'
    ];

    use HasFactory;
}
