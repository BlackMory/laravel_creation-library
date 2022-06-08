@extends('layout.app')

    @section('content')
    
    <div class="container" style="margin-top:50px" >
        <div class="row">
            <div class="col-md-6" style="margin-left:300px">
                <div class="card">
                    <h5 class="card-header">
                    Modification
                    </h5>
                    <div class="card-body">
                        <form action="{{route('editeur.update',[$editeur->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Nom Editeur</label>
                                <input type="text" class="form-control" id="text" name="nom" value={{$editeur->nom}} >
                            </div>
                            <div class="form-group">
                                <label for="">Adresse Editeur</label>
                                <input type="text" class="form-control" id="text" name="adresse" value={{$editeur->adresse}}>
                            </div>
                            <div class="form-group" style="margin-top:50px">
                                <button type="submit" class="btn btn-primary">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection