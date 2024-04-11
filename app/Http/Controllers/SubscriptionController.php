<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function print(Subscription $subscription)
    {
        
        return view('pdf.confirmation', compact('subscription'));
        
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
        $studentId = auth()->user()->student->id;
        if (Subscription::where('student_id', $studentId)->exists()) {
            Alert::warning('لديك بالفعل إشتراك.');
            return redirect()->back();
        }

        $plan = match ($request->plan) {
            '3m' => '3 أشهر',
            '6m' => '6 أشهر',
            '9m' => '9 أشهر',
            '12m' => '12 أشهر',
        };

        $subscription = Subscription::create([
            'student_id' => $studentId,
            'trip_id' => $request->trip,
            'plan' => $plan,
            'status' => 1
        ]);

        Alert::success('تهانينا، تم حجز الإشتراك بنجاح');
        return redirect('/');
    }


    /**
     * Display the specified resource.
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}
