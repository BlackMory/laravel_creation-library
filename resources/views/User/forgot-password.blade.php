@extends('layout.app')
    @section('content')
    <div class="container-fluid" style="margin-top:100px;">
        <div class="row">
            <div class="col-md-9">
                <div class="card" style="margin-left:500px;" >
                    <div class="form-group-mb-3">
                        <div class="card-header" >
                            {{ __('Mot de Passe oublié ?veuillez entre votre email pour avoir restaure votre mot de passe') }}
                        </div>
                         @if(session('status'))
                                <div class="alert alert-success">{{session('status')}}</div>
                            @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.email')}}" method="post" >
                        @csrf
                                <div class="form-group-mb-3">
                                    <label for="">email</label>
                                    <input type="email" class="form-control" name="email" placeholder="votre email" class="block mt-1 w-full" :value="old('email')" required autofocu>
                                </div>
                            </div>
                            <div class="flex items-center justify-end mt-4">
                                <button type="submit" class="btn btn-primary"> Restauraiton du Mot de Passe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection()