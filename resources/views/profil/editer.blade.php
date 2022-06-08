@extends('layout.app')

@section('content')

    <form action="{{route('profil.update',[$profils->id])}}" method="post" style="margin-top:50px;">
    @csrf
    @method('put')
        <div class="input-group flex-nowrap">
        <span class="input-group-text" id="addon-wrapping">@</span>
        <input type="text" class="form-control" name="libelle" value="{{$profils->libelle}}" aria-label="libelle" aria-describedby="addon-wrapping">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>
@endsection