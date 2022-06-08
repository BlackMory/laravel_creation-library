<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres=Genre::all();
        return view('genre.index',compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'genre'=>['required','string'],
             'description'=>['required','string'],
        ]);
        Genre::create([
            'genre'=>$request->genre,
            'description'=>$request->description,
        ]);
        return redirect('genre')->with('message','genre a été ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $genre=Genre::findOrFail($id);
        return view('genre.update',compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'genre'=>['required','string'],
            'description'=>['required','string'],
        ]);
        $genre=Genre::findOrFail($id);
        $genre->update([
            'genre'=>$request->genre,
            'description'=>$request->description,
        ]);
        return redirect('genre')->with('message',"mise a jour reussi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $genre=Genre::findOrFail($id);
        $genre->delete();
        return redirect('genre')->with('message','genre supprimer  avec success');
    }
}
