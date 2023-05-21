<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Services\TeamService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index(TeamService $teamService)
    {
        $user = request()->user();
        $adminTeam = $teamService->getByName(config('team.admin'));
        if ($user->belongsToTeam($adminTeam)) return Inertia::render('Admin/Dashboard');
        return Inertia::render('Dashboard');
    }
}
