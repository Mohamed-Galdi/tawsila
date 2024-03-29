<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'address', 'image'];

    public function trips()
    {
        return $this->hasMany(Trip::class);
    }
}
