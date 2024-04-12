<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Trip;
use App\Models\University;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Trip::with('areas')->with('university')->with('bus');

        if ($request->filled('universityId')) {
            $query->where('university_id', $request->input('universityId'));
        }

        if ($request->filled('areaId')) {
            $query->whereHas('areas', function ($q) use ($request) {
                $q->where('area_id', $request->input('areaId'));
            });
        }

        if ($request->has('clear')) {
            $trips = Trip::with('areas')->with('university')->with('bus')->paginate(12);
        } else {
            $trips = $query->paginate(6);
        }

        $areas = Area::all();
        $universities = University::all();

        return view('trips.trips', compact('trips', 'areas', 'universities'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        //
        $trip->load('areas', 'university', 'bus', 'ratings');
        return view('trips.trip', compact('trip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
