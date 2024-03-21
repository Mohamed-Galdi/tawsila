<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function university()
    {
        return $this->belongsTo(University::class);
    }
    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function driver()
    {
        return $this->hasOne(Driver::class);
    }
    public function ratings()
    {
        return $this->hasMany(TripRating::class);
    }
}
