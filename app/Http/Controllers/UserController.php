<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\Rules\Password;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::with(['profil'])->get();
        return view('user/index',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profils=Profil::all();
    
        return view('user.registre',compact('profils'));
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
            'prenom' => ['required', 'string', 'max:255'],
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed',Rules\Password::defaults()],
        ]);
        
       $user=User::create([
            'prenom'=>$request->prenom,
            'nom'=>$request->nom,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'profil_id'=>$request->profil,
        ]);
        
        event(new Registered($user));
       
        Auth::login($user);
        return redirect('user')->with('message',$user->prenom .' ajouter avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $user=User::findOrFail($id)->with('profil');
        
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $profils=Profil::all();
        return view('user.edit', compact('user','profils'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user->update([
            'prenom'=>$request->prenom,
            'nom'=>$request->nom,
            'email'=>$request->email,
            'profil_id'=>$request->profil,
        ]);

    
        return redirect('user')->with('message',"mise a jour reussi");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       

        $user=User::find($id);
        $user->delete();
        return redirect('user')->with('status','profil supprimer  avec success');
    }
    public function login(){
        return view('user.login');

    }
    public function authenticate (LoginRequest $request)
    {
        $request->authenticate();
        

        $request->session()->regenerate();
        
        // if(Auth::check() && Auth::user()->profil['libelle'] == "Administrateur"){
        // return redirect('livre')->with('message','session','vous etes connecte!');
        // }
        // else
        // return  view('livre.vue')->with('message','session','vous etes connecte!');
        return redirect('livre')->with('message',"Bienvenue!");
    }
    public function logout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/')->with('message','vous etes deconnecte');
    }
}
