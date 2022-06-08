<?php

namespace App\Http\Controllers;

use App\Models\profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profils=Profil::all();
        return view('profil.index',['profils'=>$profils]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd('bonjour');
        return view('profil.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Profil::create([
            'libelle'=>$request->libelle
        ]);
        return redirect('profil/index')->with('status','profil ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $profil=Profil::findOrFail($id);
        
        // return view('profil.index',compact('profil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $profils=Profil::findOrFail($id);
        return view('profil.editer',compact('profils'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $profil=Profil::find($id);
        $profil->update([
            'libelle'=>$request->libelle
        ]);
        return redirect('profil/index')->with('status','profil mise a jour avec success');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil=Profil::find($id);
        $profil->delete();
        return redirect('profil/index')->with('status','profil supprimer  avec success');
    }
}
