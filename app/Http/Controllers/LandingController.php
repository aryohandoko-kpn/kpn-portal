<?php
// app/Http/Controllers/LandingController.php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View
    {
        $applications = Application::query()
            ->active()
            ->orderBy('display_order')
            ->take(6)
            ->get();

        return view('welcome', compact('applications'));
    }
}