@extends('layout.app')
        @section('content')
        <div class="container" style="margin-top:50px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    
                        <div class="card-header">
                            <h4>Utilisateurs</h4>
                            @if(session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif
                        </div>
                        <div class="card-body">
                            <a href="{{route('user.create')}}" >
                            <button type="button" class="btn btn-info" style="margin-left:1200px"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg> </button></a>
                            <table data-toggle="table"
                                    data-toolbar="#toolbar"
                                    data-height="428"
                                    data-pagination="true" id="table" class="table table-responsive">
                                    
                            <thead>
                                <tr>
                                    <th data-field="prenom">Prenom</th>
                                    <th data-field="nom">Nom</th>
                                    <th data-field="email">Email</th>
                                    <th data-field="profil">Profil</th>
                                    <th data-field="action">Action</th>
                                    
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        @foreach($users as $user)
                                            <td>{{$user->prenom}}</a></td>
                                            <td>{{ucwords($user->nom)}}</td>
                                            <td>{{ucwords($user->email)}}</td>
                                            <td>{{ucwords($user->profil->libelle)}}</td>
                                            <td><a href="/user/edit/{{$user->id}}" class="btn btn-primary" >Modifier</a>
                                                <a href="/user/delete/{{$user->id}}" onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');" class="btn btn-danger">Supprimer</a>
                                                </td>
                                    </tr>
                                            @endforeach 
                                </tbody>
                                 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
        @endsection
    