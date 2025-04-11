<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function welcome(Request $request)
    {
        $search = $request->search;
        $games = Game::where('title', 'LIKE', "%$search%")
        ->take(6)->get();

        return view('welcome', ['games' => $games]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $games = Game::where('title', 'LIKE', "%$search%")
            ->latest()
            ->paginate(8); // Jumlah game per page

        // Jika permintaan via AJAX (untuk Load More)
        if ($request->ajax()) {
            return view('user._game_list', compact('games'))->render();
        }

        // Permintaan awal (halaman penuh)
        return view('user.games', compact('games'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        // Ambil semua game selain yang sedang ditampilkan
        $games = Game::whereNot('id', $game->id)
            ->take(8)
            ->get();

        return view('user.game.show', [
            'game' => $game,
            'games' => $games
        ]);
    }
}
