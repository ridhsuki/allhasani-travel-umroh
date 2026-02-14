<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function __invoke(Request $request)
    {
        $packages = Package::latest()->get();

        return view('landing', [
            'packages' => $packages
        ]);
    }
}
