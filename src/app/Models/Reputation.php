<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reputation extends Model
{
    use HasFactory;
    protected $fillable = [
        'reservation_id',
        'score',
        'comment'
    ];
}
