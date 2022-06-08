 @extends('layout.app')

    @section('content')
    
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-6" style="margin-left:300px">
                <div class="card">
                    <h5 class="card-header">
                    Nouvel Editeur
                    </h5>
                    <div class="card-body">
                        <form action="{{route('livre.update',[$livre->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="form-group">
                                <label for="">Nom</label>
                                <input type="text" class="form-control" id="text" name="nom" value={{$livre->nom}}>
                            </div>
                            <div class="form-group">
                                <label for="">La Couverture</label>
                                <input type="file" class="form-control" id="text" name="couverture" value={{'/uploads/'.$livre->couverture}}>
                            </div>
                            <div class="form-group">
                                <label for="">Le Nombre de Page</label>
                                <input type="text" class="form-control" id="text" name="nombre" value={{$livre->nombre_page}}>
                            </div>
                            <div class="form-group">
                                <label for="">Le Resume</label>
                                <input type="text" class="form-control" id="text" name="resume" value={{$livre->resume}}>
                            </div>
                            <div class="form-group">
                                <label for="">Auteur</label>
                                <input type="text" class="form-control" id="text" name="auteur" value={{$livre->auteur}}>
                            </div>
                            <div class="form-group">
                                <label for="">Le Genre</label>
                                <select class="form-control" name="genre" id="">
                                        @foreach($genres as $genre)
                                            <option value="{{$genre->id}}" {{$livre->genre_id==$genre->id ?'selected':''}} >{{$genre->genre}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="">Editeur</label>
                                    <select class="form-control" name="editeur" id="">
                                        @foreach($editeurs as $editeur)
                                            <option value="{{$editeur->id}}" {{$livre->editeur_id==$editeur->id ? 'selected':''}} >{{$editeur->nom}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group" style="margin-top:10px">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection