<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = ['university_id', 'bus_id', 'driver_id', 'times_per_day', 'first_going_time', 'first_return_time', 'second_going_time', 'second_return_time'];

    public function areas()
    {
        return $this->belongsToMany(Area::class);
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
        return $this->belongsTo(Driver::class);
    }
    public function ratings()
    {
        return $this->hasMany(TripRating::class);
    }
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
