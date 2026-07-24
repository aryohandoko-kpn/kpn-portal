<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Category;
use Illuminate\Http\Request;
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
    public function production(Request $request): View
    {
        return $this->renderPortal($request, 'Production', 'portals.production');
    }

    /**
     * Development Portal
     */
    public function development(Request $request): View
    {
        return $this->renderPortal($request, 'Development', 'portals.development');
    }

    private function renderPortal(Request $request, string $environment, string $view): View
    {
        $applications = Application::query()
            ->with('category')
            ->active()
            ->where('environment', $environment)
            ->when($request->search, fn($q) => $q->where('name', 'like', "%{$request->search}%"))
            ->when($request->category_id, fn($q) => $q->where('category_id', $request->category_id))
            ->orderBy('display_order')
            ->orderBy('name')
            ->paginate(9)
            ->withQueryString();

        $categories = Category::where('is_active', true)->get();

        return view($view, compact('applications', 'categories'));
    }
}