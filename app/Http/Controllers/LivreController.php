<?php

namespace App\Http\Controllers;
use App\Models\Genre;
use App\Models\Livre;
use App\Models\Editeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LivreController extends Controller
{
    protected $redirectRoute = 'livre';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check() && Auth::user()->profil['libelle']=='administrateur'){
            $livres=Livre::with(['genre','editeur'])->get();
        return view('livre.index',compact('livres'))->with('message','Bienvenue');
        }
        else{
        $livres=Livre::with(['genre','editeur'])->get();
        return view('livre.vue',compact('livres'))->with('message','Bienvenue');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $livres=Livre::all();
        $editeurs=Editeur::all();
         $genres=Genre::all();
        return view('livre.create',compact('genres','editeurs'));
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
            'nom'=>['required','string'],
            'couverture'=>['required'],
            'nombre'=>['required'],
            'resume'=>['required','string'],
            'auteur'=>['required','string'],

        ]);
        $livre=new Livre;
        $livre->nom=$request->nom;
        $livre->nombre_page=$request->nombre;
        $livre->resume=$request->resume;
        $livre->auteur=$request->auteur;
        $livre->genre_id=$request->genre;
        $livre->editeur_id=$request->editeur;
        if($request->hasfile('couverture'))
        {
            $file = $request->file('couverture');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/', $filename);
            $livre->couverture=$filename;
        }

        $livre->save();
        return redirect('livre')->with('message','livre ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $livre=Livre::findOrFail($id);
        return view('livre.show',compact('livre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $livre=Livre::findOrFail($id);
        $editeurs=Editeur::all();
        $genres=Genre::all();
        return view('livre.update',compact('livre','editeurs','genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        $request->validate([
            'nom'=>['string'],
            'couverture'=>['string'],
            'nombre_page'=>['integer'],
            'resume'=>['string'],
            'auteur'=>['string'],
        ]);
        

        $livre=Livre::findOrFail($id);
        if($request->couverture!=""){
        $livre->update([
            'nom'=>$request->nom,
            'couverture'=>$request->couverture,
            'nombre_page'=>$request->nombre,
            'resume'=>$request->resume,
            'auteur'=>$request->auteur,
            'genre_id'=>$request->genre,
            'editeur_id'=>$request->editeur,
        ]); 
    }
        else{
            $livre->update([
                'nom'=>$request->nom,
                'nombre_page'=>$request->nombre,
                'resume'=>$request->resume,
                'auteur'=>$request->auteur,
                'genre_id'=>$request->genre,
                'editeur_id'=>$request->editeur,
            ]); 
        }
        return redirect('livre')->with('message','mise a jour reussi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livre=Livre::findOrFail($id);
        $livre->delete();
        return redirect('livre')->with('message',$livre->nom,'a ete supprimer');
    }
}
