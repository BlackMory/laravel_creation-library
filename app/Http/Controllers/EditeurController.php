<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use Illuminate\Http\Request;

class EditeurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editeur=Editeur::all();
        return view('editeur.index',compact('editeur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('editeur.create');
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
            'nom' =>['required','string','max:255'],
            'adresse'=>['required','string','max:255'],
        ]);
        Editeur::create([
            'nom'=>$request->nom,
            'adresse'=>$request->adresse,
        ]);
        return redirect('editeur')->with('message','vous avez ajoute un nouveau editeur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\editeur  $editeur
     * @return \Illuminate\Http\Response
     */
    public function show(editeur $editeur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\editeur  $editeur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editeur=Editeur::findOrFail($id);

        return view('editeur.update',compact('editeur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\editeur  $editeur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $request->validate([
            'nom'=>['required','string','max:255'],
            'adresse'=>['required','string','max:255'],
        ]);
        $editeur=Editeur::findOrFail($id);
        $editeur->update([
            'nom'=>$request->nom,
            'adresse'=>$request->adresse,
        ]);
        return redirect('editeur')->with('message','mise a jour reussi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\editeur  $editeur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $editeur=Editeur::findOrFail($id);
        $editeur->delete();
        return redirect('editeur')->with('message','editeur supprimer  avec success');
    }
}
