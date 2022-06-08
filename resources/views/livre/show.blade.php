
@extends('layout.app')
    @section('content')

    <div class="container" style="margin-top:40px">
        <div class="card mb-3" >
            <div class="row g-0">
                <div class="col-md-4">
                @if($livre->couverture!=null)
                <img src="{{('/uploads/'.$livre->couverture)}}" class="img-fluid rounded-start" alt="...">
                @else
                <img src="{{("/group/livre.jpg")}}" class="img-fluid rounded-start" alt="...">
                @endif
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title" style="text-align:justify">{{$livre->nom}}</h5>
                    <p class="card-text">{{$livre->resume}}</p>
                    <p class="card-text">{{$livre->genre->genre}}</p>
                    <p class="card-text">{{$livre->editeur->nom}}</p>
                    <p class="card-text"><small class="text-muted">{{$livre->auteur}}</small></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    @endsection