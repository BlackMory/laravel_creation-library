<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.20.1/dist/bootstrap-table.min.css">
    <link href="https://unpkg.com/bootstrap-table@1.20.1/dist/bootstrap-table.min.css" rel="stylesheet">
    <link href="https://unpkg.com/bootstrap-table@1.20.1/dist/themes/foundation/bootstrap-table-foundation.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-table@1.20.1/dist/bootstrap-table.min.js"></script> 
<script src="https://unpkg.com/bootstrap-table@1.20.1/dist/themes/foundation/bootstrap-table-foundation.min.js"></script>
    <title>Document</title>
    <style type="text/css">
        body{
            background-image: url("group/43122.jpg");
            background-repeat: no-repeat;
            width:100%;
            height:auto;
        }
    </style>
</head>
<body>
    <div class="container" style="margin-top:200px;" >
        <div class="row justify-content-center ">
                

                    
            <div class="col-md-5" style="height:200px center">
                <div class="card">
                    <div class="card-header">SE CONNECTER</div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{route('user.authenticate')}}" method="Post">
                                @csrf
                                <!-- Validation Errors -->
                                <div class="form-group-mb-">
                                    <label for="">Email</label>
                                    @if ($errors->has('email'))
                                            <div  class="alert alert-danger" role="alert">{{ $errors->first('email') }}</div>
                                        @endif
                                    <input type="text" name="email" placeholder="Votre Email" class="form-control" value="{{old('email')}}" required autofocus>
                                </div>
                                <div class="form-group-mb-3">
                                    <label for="">Mot de Passe</label>
                                     @if ($errors->has('password'))
                                            <div class="error" class="alert alert-primary" role="alert">{{ $errors->first('password') }}</div>
                                            @endif
                                    <input type="password" name="password" placeholder="Mot de Passe" class="form-control">
                                </div>
                                <div class="form-group-mb-3">
                                    <label for="">remember me</label>
                                    <input type="checkbox" name="remember"  >
                                </div>
                                <div class="flex items-center justify-end mt-4">
                                       
                                    <div class="form-group-mb-3">
                                    <a href="{{route('user.password')}}"  >Mot de Passe Oublié?</a>
                                        <button type="submit" class="btn btn-primary"  style="margin-left:10px" >Connexion</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-table@1.20.1/dist/bootstrap-table.min.js"></script>
</body>
</html>