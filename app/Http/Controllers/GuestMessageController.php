<?php

namespace App\Http\Controllers;

use App\Models\GuestMessage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GuestMessageController extends Controller
{
    
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

}
