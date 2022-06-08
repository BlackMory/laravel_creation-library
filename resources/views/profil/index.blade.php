    @extends('layout.app')
        @section('content')
        @if(session('status'))
            <div class="alert alert-success">{{session('status')}}</div>
        @endif
        <div class="container" style="margin-top:50px;">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>profil</h4>
                        </div>
                        <div class="card-body">
                         <a href="/profil/create/" >
                            <button type="button" class="btn btn-info" style="margin-left:1200px">
                          
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                            
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                </svg> 
                            </button>
                             </a> 
                            <table data-toggle="table"
                                    data-toolbar="#toolbar"
                                    data-height="428"
                                    data-pagination="true">
                            <thead>
                                <tr>
                                    <th data-field="libelle">Libelle</th>
                                    <th data-field="action">Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                            @foreach($profils as $profil)
                                                <td>{{$profil->libelle}}</td>
                                                <td><a href="/profil/edit/{{$profil->id}}" class="btn btn-info" >Modifier</a>
                                                    <a href="/profil/delete/{{$profil->id}}" onclick="return confirm('Etes vous sûre de vouloir supprimer cette valeur ?');" class="btn btn-danger">Supprimer</a></td>
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
    