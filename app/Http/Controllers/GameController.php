<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{

    public function index()
    {

        $model = Game::all();

        return view('game.index', compact(['model']));

    }


    public function add()
    {

        return view('game.add');

    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'cover_art' => 'required',
            'developer' => 'required',
            'release_year' => 'required',
            'genre' => 'required',
        ]);

        $item = new Game();

        $item->title = $request->title;

        $file = $request->file('cover_art');
        $name = rand(100000, 999999) . '_' . $file->getClientOriginalName();

        $file->storeAs('/public/uploads', $name);

        $item->cover_art = $name;

        $item->developer = $request->developer;
        $item->release_year = $request->release_year;
        $item->genre = $request->genre;

        $item->save();

        return redirect()->route('game.index');

    }



    public function edit(Game $item)
    {

        return view('game.edit', compact(['item']));

    }



    public function update(Game $item, Request $request)
    {

        $request->validate([
            'title' => 'required',
            // 'cover_art' => 'required',
            'developer' => 'required',
            'release_year' => 'required',
            'genre' => 'required',
        ]);

        $item->title = $request->title;

        $file = $request->file('cover_art');

        if ($file) {

            Storage::delete('/public/uploads/' . $item->cover_art);

            $name = rand(100000, 999999) . '_' . $file->getClientOriginalName();

            $file->storeAs('/public/uploads', $name);

            $item->cover_art = $name;

        }

        $item->developer = $request->developer;
        $item->release_year = $request->release_year;
        $item->genre = $request->genre;

        $item->save();

        return redirect()->route('game.index');

    }


    public function delete(Game $item)
    {

        $item->delete();

        return redirect()->route('game.index');

    }



}
