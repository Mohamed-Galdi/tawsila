<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TripRating extends Model
{
    use HasFactory;

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
