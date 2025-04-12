<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use ZipArchive;

class GameVersionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Game $game)
    {
        //
        return view('games.versions.form', compact('game'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Game $game)
    {
        $validated = $request->validate([
            'version' => 'required|string',
            'path' => 'required|file|mimes:zip',
            'cover' => 'required|file|image'
        ]);

        $file = $request->file('cover');
        $zip = new ZipArchive;
        $zip->open($request->file('path'));
        $validated['path'] = 'games/' . $game->slug . uniqid();
        $validated['cover'] = $file->store('games/' . $game->slug . "/" . $validated['version']);
        $zip->extractTo(Storage::path($validated['path']));
        $game->versions()->create($validated);

        return redirect()->route('game.show', $game);
    }

    /**
     * Display the specified resource.
     */
    public function show(GameVersion $gameVersion)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game, GameVersion $version)
    {
        $user = Auth::user();
        abort_if((!$user->hasRole('admin') && $user()->isNot($version->game->user)), 401);
        return view('games.versions.form', compact('game', 'version'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GameVersion $gameVersion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GameVersion $gameVersion)
    {
        //
    }
}
