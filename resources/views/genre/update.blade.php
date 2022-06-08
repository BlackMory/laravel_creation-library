 @extends('layout.app')

    @section('content')
    
    <div class="container" style="margin-top:50px;">
        <div class="row">
            <div class="col-md-6" style="margin-left:300px">
                <div class="card">
                    <h5 class="card-header">
                    Modification
                    </h5>
                    <div class="card-body">
                        <form action="{{route('genre.update',[$genre->id])}}" method="post">
                        @csrf
                            <div class="form-group">
                                <label for="">Genre</label>
                                <input type="text" class="form-control" id="text" name="genre" value={{$genre->genre}}>
                            </div>
                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" id="text" name="description" value="{{$genre->description}}">
                            </div>
                            <div class="form-group" style="margin-top:20px">
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection