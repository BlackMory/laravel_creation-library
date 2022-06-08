 @extends('layout.app')

    @section('content')
    
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-6" style="margin-left:300px">
                <div class="card">
                    <h5 class="card-header">
                    Nouveau Livre
                    </h5>
                    <div class="card-body">
                        <form action="{{route('livre.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                            <div class="form-group">
                                <label for="">Nom</label>
                                 @error('nom')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" id="text" name="nom" value="{{ old('nom') }}" class="@error('nom') is-invalid @enderror"> 
                                
                            </div>
                            <div class="form-group">
                                <label for="">Couverture</label>
                               @error('couverture')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="file" class="form-control" id="text" name="couverture" value="{{ old('couverture') }}" accept="image/jpeg,image/jpg,image/png">
                            </div>
                            <div class="form-group">
                                    
                                <label for="">Nombre de Page</label>
                                @error('nombre')
                                    <div class="alert alert-danger">{{ $message}}</div>
                                @enderror
                                <input type="number" class="form-control" id="text" name="nombre" value="{{ old('nombre') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Resume</label>
                                    @error('resume')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <input type="text" class="form-control" id="text" name="resume" value="{{ old('resume') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Auteur</label>
                                    @error('auteur')
                                    <div class="alert alert-danger">{{ $pass ?? 'champs obligatoire' }}</div>
                                @enderror
                                <input type="text" class="form-control" id="text" name="auteur" value="{{ old('auteur') }}">
                            </div>
                            <div class="form-group">
                                <label for="">Genre</label>
                                <select class="form-control" name="genre" id="">
                                        @foreach($genres as $genre)
                                            <option value="{{$genre->id}}">{{$genre->genre}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="">Editeur</label>
                                    <select class="form-control" name="editeur" id="">
                                        @foreach($editeurs as $editeur)
                                            <option value="{{$editeur->id}}">{{$editeur->nom}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group" style="margin-top:10px">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection