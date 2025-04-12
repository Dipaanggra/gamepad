<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreGameRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateGameRequest;
use App\Models\GameVersion;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            // Admin bisa lihat semua game
            $games = Game::orderBy('created_at', 'desc')
                ->paginate(10)
                ->onEachSide(1);
        } else {
            // User biasa hanya bisa lihat game milik mereka sendiri
            $games = Game::orderBy('created_at', 'desc')
                ->where('user_id', $user->id)
                ->paginate(10)
                ->onEachSide(1);
        }
        return view('games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('games.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {
        $game = $request->user()->games()->create(
            $request->validated()
        );
        return redirect()->route('game.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return view('games.show', ['game' => $game, 'versions' => $game->versions()->paginate(5)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Game $game)
    {
        $user = Auth::user();
        abort_if((!$user->hasRole('admin') && $user()->isNot($game->user)), 401);
        return view('games.form', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        $game->update(
            $request->validated()
        );
        return redirect()->route('game.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('game.index');
    }
}
