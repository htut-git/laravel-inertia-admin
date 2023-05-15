<?php

namespace App\Http\Middleware;

use App\Models\Team;
use App\Services\TeamService;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$teamSlug): Response
    {
        $user = $request->user();
        $team = (new TeamService)->getByName($teamSlug);
        if ($user->belongsToTeam($team)) {
            return $next($request);
        }
        abort(403,'Cannot Accessible!');
    }
}
