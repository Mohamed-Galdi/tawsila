<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $fillable = ['license_number', 'license_image', 'status'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trip()
    {
        return $this->hasOne(Trip::class);
    }
}
