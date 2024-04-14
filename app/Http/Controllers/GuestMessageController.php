<?php

namespace App\Http\Controllers;

use App\Models\GuestMessage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GuestMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Create and store the message
        $guestMessage = new GuestMessage();
        $guestMessage->name = $validatedData['name'];
        $guestMessage->email = $validatedData['email'];
        $guestMessage->message = $validatedData['message'];
        $guestMessage->save();

        // Send toast notification
        Alert::success('شكرا على التواصل معنا', 'سيتم الرد عليك من قبل المشرفين في اقرب وقت');

        // Redirect back to the contact us page
        return redirect()->back();
    }
    

    /**
     * Display the specified resource.
     */
    public function show(GuestMessage $guestMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuestMessage $guestMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GuestMessage $guestMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuestMessage $guestMessage)
    {
        //
    }
}
