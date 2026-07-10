<?php
// app/Http/Controllers/ApplicationController.php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    public function index(Request $request): View
    {
        $applications = Application::query()
            ->with('category')
            ->active()
            ->when($request->search, fn($q) => $q->where('name', 'like', "%{$request->search}%"))
            ->when($request->category_id, fn($q) => $q->where('category_id', $request->category_id))
            ->when($request->department, fn($q) => $q->where('department', $request->department))
            ->when($request->environment, fn($q) => $q->where('environment', $request->environment))
            ->orderBy('display_order')
            ->paginate(9)
            ->withQueryString();

        $categories = Category::where('is_active', true)->get();

        return view('applications.index', compact('applications', 'categories'));
    }

    public function show(Application $application): View
    {
        abort_unless($application->is_active, 404);

        return view('applications.show', compact('application'));
    }
}