<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = ['student_id', 'trip_id', 'plan', 'start_date', 'end_date'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
