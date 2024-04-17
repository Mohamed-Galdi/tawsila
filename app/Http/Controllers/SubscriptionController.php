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
        
        return view('pdf.sub_confirmation', compact('subscription'));
        
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

}
