<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\View\View;

class LandingController extends Controller
{
    /**
     * Landing Page
     */
    public function index(): View
    {
        return view('welcome.landing');
    }

    /**
     * Production Portal
     */
    public function production(): View
    {
        $applications = Application::query()
            ->with('category')
            ->active()
            ->where('environment', 'Production')
            ->orderBy('display_order')
            ->orderBy('name')
            ->get();

        return view('portals.production', compact('applications'));
    }

    /**
     * Development Portal
     */
    public function development(): View
    {
        $applications = Application::query()
            ->with('category')
            ->active()
            ->where('environment', 'Development')
            ->orderBy('display_order')
            ->orderBy('name')
            ->get();

        return view('portals.development', compact('applications'));
    }
}