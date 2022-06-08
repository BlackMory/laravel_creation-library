    @extends('layout.app')

    @section('content')
    <div class="container" style="margin-top:50px;">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Nouveau profil</h4>
                        <a href="{{route('profil.index')}}" class="btn btn-danger float-end">List des Profils</a>
                        <a href="{{route('user.index')}}" class="btn btn-primary float-end"> Voir les Utilisateurs</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('profil.store') }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group-mb-3">
                                    <label for="">Ajouter un Profil</label>
                                    <input type="text" name="libelle" placeholder="ajouter un profil" class="form-control">
                                </div>
                                <div class="form-group-mb-3">
                                    <button type="submit" class="btn btn-primary" >Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection