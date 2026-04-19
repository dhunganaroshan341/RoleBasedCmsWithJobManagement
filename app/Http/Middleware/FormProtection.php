<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FormProtection
{
    public function handle(Request $request, Closure $next)
    {
        /*
        |--------------------------------------------------------------------------
        | 1. Honeypot check
        |--------------------------------------------------------------------------
        */
        if ($request->filled('hp_field')) {
            return back()->with('error', 'Spam detected')->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | 2. Time-based check (bot submits too fast)
        |--------------------------------------------------------------------------
        */
        $time = (int) $request->input('hp_time');

        if ($time) {
            $diff = now()->timestamp - $time;

            if ($diff < 3) {
                return back()->with('error', 'Form submitted too fast')->withInput();
            }
        }

        return $next($request);
    }
}
