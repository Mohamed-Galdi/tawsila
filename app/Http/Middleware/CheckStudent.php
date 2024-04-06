<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class CheckStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!auth()->check()) {
            Alert::info('سجل الدخول', 'للقيام بحجز، يرجى تسجيل الدخول كطالبة');{{{}}}
            return redirect('/login-choice'); // Redirect to login if not authenticated
        }


        // Check if the user has the 'student' role
        if (auth()->user()->role !== 'student') {
            Alert::info('سجل الدخول', 'للقيام بحجز، يرجى تسجيل الدخول كطالبة');
            return redirect('/login-choice');
        }

        return $next($request);
    }
}
