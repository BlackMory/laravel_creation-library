
@extends('layout.app')
    @section('content')
        <div class="card border-primary mb-3" style="max-width: 18rem;" style="margin-top:50px;">
        <div class="card-header">{{$user->profil->libelle}}</div>
        <div class="card-body text-primary">
            <h5 class="card-title">{{$user->prenom}},{{$user->nom}}</h5>
            <p class="card-text">{{$user->email}}</p>
        </div>
        </div>
    @endsection