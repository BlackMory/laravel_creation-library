@extends('layout.app')
    @section('content')
    <div class="container-fluid" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="margin-left:500px;" >
                    <div class="form-group-mb-3">
                        <h5 class="card-header">Renitialisation du mot de passe 
                         @if(session('status'))
                                <div class="alert alert-success">{{session('status')}}</div>
                            @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update')}}" method="post" >
                        @csrf
                        
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{$request->route('token') }}">
                                <div class="form-group-mb-3">
                                    <label for="">Email</label>
                                    @if($errors->has('email'))
                                        <div class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
                                    @endif
                                    <input type="email" class="form-control" name="email" placeholder="Votre Email" class="block mt-1 w-full" :value="old('email')" required autofocus/>
                                </div>
                                <div class="form-group-mb-3">
                                    
                                    <label for="">Mot de Passe</label>
                                    
                                    @if($errors->has('password'))
                                        <div class="alert alert-danger" role="alert">{{ $errors->first('password') }}</div>
                                    @endif
                                    <input type="password" class="form-control" name="password" placeholder="Votre Mot de Passe" class="block mt-1 w-full" :value="old('email')" required autofocu>
                                </div>
                                <div class="form-group-mb-3">
                                    <label for="">Confirmer votre Mot de Passe</label>
                                    @if($errors->has('password_confirmation'))
                                        <div class="error">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="confirmation du mot de passe" class="block mt-1 w-full" :value="old('email')" required autofocu>
                                </div>
                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-primary"> Creer un Nouveau de Passe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection()