@extends('layout.app')
        @section('content')
        
        <div class="container" style="margin-top:50px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Livres</h4>
                        </div>
                        
                        <div class="card-body">  
                        <a href="{{route('livre.create')}}" >
                            <button type="button" class="btn btn-info" style="margin-left:1200px"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-plus-square" viewBox="0 0 16 16">
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                            </svg> </button></a>
                            @if(session('message'))
                                <div class="alert alert-success">{{session('message')}}</div>
                            @endif
                            <table data-toggle="table"
                                    data-toolbar="#toolbar"
                                    data-height="428"
                                    data-pagination="true"
                                     id="table">
                                    
                            <thead>
                                <tr>
                                    <th data-field="prenom">Nom</th>
                                    <th data-field="profil">Nombre de Page</th>
                                    <th data-field="resume">Resume</th>
                                    <th data-field="auteur">Auteur</th>
                                    <th data-field="genre">Genre</th>
                                    <th data-field="editeur">Editeur</th>
                                    <th data-field="action">Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        @foreach($livres as $livre)
                                            <td>{{$livre->nom}}</td>
                                            <td>{{$livre->nombre_page}}</td>
                                            <td>{{$livre->resume}}</td>
                                            <td>{{$livre->auteur}}</td>
                                            <td>{{$livre->genre->genre}}</td>
                                            <td>{{$livre->editeur->nom}}</td>
                                            <td><a href="/livre/edit/{{$livre->id}}" class="btn btn-primary" >Modifier</a>
                                                <a href="/livre/delete/{{$livre->id}}" onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');" class="btn btn-danger">Supprimer</a>
                                                <a href="/livre/show/{{$livre->id}}" class="btn btn-info" >Detail</a>
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
    