<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ApiGameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Game::all();

        return response()->json([
            'success' => true,
            'data' => $model ?? []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
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

        $name = rand(100000, 999999).'_'.$file->getClientOriginalName();

        $file->storeAs('/public/uploads', $name);

        $item->cover_art = $name;

        $item->developer = $request->developer;
        $item->release_year = $request->release_year;
        $item->genre = $request->genre;

        $item->save();

        return response()->json([
            'success' => true,
            'data' => $item
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Game::find($id);
        if(empty($model)){
            return response()->json([
                'success' => false,
                'data' => $model
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            // 'cover_art' => 'required',
            'developer' => 'required',
            'release_year' => 'required',
            'genre' => 'required',
        ]);

        $item = Game::find($id);

        $item->title = $request->title;

        $file = $request->file('cover_art');

        if($file){

            Storage::delete('/public/uploads/'.$item->cover_art);

            $name = rand(100000, 999999).'_'.$file->getClientOriginalName();

            $file->storeAs('/public/uploads', $name);

            $item->cover_art = $name;

        }

        $item->developer = $request->developer;
        $item->release_year = $request->release_year;
        $item->genre = $request->genre;

        $item->save();

        return response()->json([
            'success' => true,
            'data' => $item
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $item = Game::find($id);

        $item->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa mềm thành công'
        ]);

    }
}
