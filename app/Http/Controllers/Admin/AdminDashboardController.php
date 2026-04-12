<?php

namespace App\Http\Controllers\Admin;

use App\Services\DashboardService;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index()
    {
        $stats = $this->dashboardService->getStats();
        $assets = $this->dashboardService->getAssets();
        // dd($assets);
        return view('Admin.pages.Dashboard.index', array_merge($stats, $assets));
    }
}
