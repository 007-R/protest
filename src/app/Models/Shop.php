<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'area_id',
        'genre_id',
        'name',
        'description',
        'photo'
    ];
    public function area()
    {
        return $this->belongsTo(area::class);
    }
    public function genre()
    {
        return $this->belongsTo(genre::class);
    }
    public function favorite()
    {
        return $this->belongsTo(Favorite::class);
    }
    public function csvHeader(): array
    {
        return [
            'name',
            'area_id',
            'genre_id',
            'description',
        ];
    }
}
