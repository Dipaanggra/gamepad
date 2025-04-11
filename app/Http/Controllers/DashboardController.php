<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = Auth::user();
        $now = now();
        $lastMonth = now()->subMonth();

        $gamesQuery = Game::query();

        if ($user->hasRole('developer')) {
            $gamesQuery->where('user_id', $user->id);
            $gameIds = $user->games()->pluck('id');
        }

        // Total bulan ini
        $totalGames = (clone $gamesQuery)
            ->whereMonth('created_at', $now->month)
            ->whereYear('created_at', $now->year)
            ->count();


        // Total bulan lalu
        $lastGames = (clone $gamesQuery)
            ->whereMonth('created_at', $lastMonth->month)
            ->whereYear('created_at', $lastMonth->year)
            ->count();

        // Growth calculation
        $growthGames = $lastGames > 0 ? round((($totalGames - $lastGames) / $lastGames) * 100, 1) : null;

        return view('dashboard', [
            'totalGames' => $totalGames,
            'growthGames' => $growthGames,
            'games' => Game::take(10)->get(),
        ]);
    }
}
