@extends('layout.app')
@section('content')
    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center ">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Nouvel Utilisateur</h4>
                            
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('user.store')}}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group-mb-3">
                                    <label for="">Prenom</label>
                                    <input  type="text" name="prenom" placeholder="Ajouter Prenom" class="form-control" value="{{ old('prenom') }}" required min="3">
                                    @if ($errors->has('prenom'))
                                        <div class="error">{{ $errors->first('prenom') }}</div>
                                    @endif
                                </div>
                                <div class="form-group-mb-3">
                                    <label for="">Nom</label>
                                     @if ($errors->has('nom'))
                                            <div class="error">{{ $errors->first('nom') }}</div>
                                            @endif
                                    <input type="text" name="nom" placeholder="Ajouter Nom" class="form-control" value="{{ old('nom') }}">
                                </div>
                                <div class="form-group-mb-3">
                                    <label for="">Email</label>
                                     @if ($errors->has('email'))
                                            <div class="error">{{ $errors->first('email') }}</div>
                                            @endif
                                    <input type="email" name="email" placeholder="Ajouter Email" class="form-control" value="{{ old('nom') }}" >
                                </div>
                                <div class="form-group-mb-3">
                                    <label for="">Mot de Passe</label>
                                    <input type="password" name="password" placeholder="Ajouter Mot de Passe" class="form-control" required autocomplete="new-password" >
                                </div>

                                   
                                    <div class="form-group-mb-3">
                                      <label for=""> Confirmer Mot de Passe</label>
                                            @if ($errors->has('password'))
                                            <div class="error">{{ $errors->first('password') }}</div>
                                            @endif
                                        <input type="password" name="password_confirmation" required placeholder="Confirmer Mot de Passe" class="form-control">
                                        
                                    </div>
                                
                                <div class="form-group-mb-3">
                                    <label for="">Profil</label>
                                    <select class="form-control" name="profil" id="">
                                        @foreach($profils as $profil)
                                            <option value="{{$profil->id}}">
                                            {{$profil->libelle}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                    <div class="form-group-mb-3">
                                       
                                        <button type="submit" class="btn btn-primary" >s'engistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection