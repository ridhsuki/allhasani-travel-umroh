<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function __invoke(Request $request)
    {
        $packages = Package::where('is_active', true)->latest()->get();

        $testimonials = Testimonial::where('is_active', true)->latest()->limit(10)->get();

        return view('landing', [
            'packages' => $packages,
            'testimonials' => $testimonials,
        ]);
    }

    public function allPackages()
    {
        $packages = Package::where('is_active', true)->latest()->paginate(9);

        return view('landing.packages-index', compact('packages'));
    }
    public function showPackage($slug)
    {
        $package = Package::where('slug', $slug)->where('is_active', true)->firstOrFail();

        return view('landing.package-detail', compact('package'));
    }
}
