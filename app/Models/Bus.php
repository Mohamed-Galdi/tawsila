<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;
    protected $fillable = ['number', 'image', 'total_seats', 'available_seats', 'status'];

    public function trip()
    {
        return $this->hasOne(Trip::class);
    }
}
