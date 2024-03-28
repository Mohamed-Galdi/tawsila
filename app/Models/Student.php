<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
    public function rating()
    {
        return $this->hasOne(TripRating::class);
    }
    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }
}
