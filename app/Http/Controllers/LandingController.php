<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function __invoke(Request $request)
    {
        $packages = Package::latest()->get();

        $testimonials = Testimonial::where('is_active', true)->latest()->limit(10)->get();

        return view('landing', [
            'packages' => $packages,
            'testimonials' => $testimonials, 
        ]);
    }
}
