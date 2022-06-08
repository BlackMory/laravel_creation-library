@extends('layout.app')
@section('content')
    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Modification</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('user.update',[$user->id])}}" method="Post">
                                @csrf
                                @method('put')
                                <div class="form-group-mb-3">
                                    <label for="">Prenom</label>
                                    <input type="text" name="prenom" value="{{$user->prenom}}" class="form-control">
                                </div>
                                <div class="form-group-mb-3">
                                    <label for="">Nom</label>
                                    <input type="text" name="nom" value="{{$user->nom}}" class="form-control">
                                </div>
                                <div class="form-group-mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="{{$user->email}}" class="form-control">
                                </div>
                                <div class="form-group-mb-3">
                                    <label for="">Profil</label>
                                    <select class="form-control" name="profil" id="profil">
                                        @foreach($profils as $profil)
                                            <option value="{{$profil->id}}" {{ $user->profil_id == $profil->id ? 'selected' : '' }} >
                                                {{$profil->libelle}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group-mb-3">
                                    <button type="submit" class="btn btn-primary" >Modifier</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection