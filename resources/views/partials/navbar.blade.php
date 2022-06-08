<nav class="navbar navbar-expand-lg  bg-light">
 <div class="container-fluid">
    <a class="navbar-brand" href="{{route('livre.index')}}">Bibliotheque</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      @if(auth()->check() && Auth()->user()->profil['libelle']=='administrateur')
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{route('editeur.index')}}">Editeur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('user.index')}}">Utilisateur</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('genre.index')}}">Genre</a>
            </li>
        
        <li class="nav-item">
              <a class="nav-link" href="{{route('livre.index')}}">Livre</a>
            </li>
            </ul>
        @else
      @endif
       
      <div class="d-flex">
        <div class="dropdown me-1">
          <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-bs-toggle="dropdown" aria-expanded="false" data-bs-offset="10,20">
            {{ Auth::user()->nom }} <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
            <ul class="navbar-nav" class="d-flex" >
        
              <li class="nav-item" >
                 @if(auth()->user()!=null)
                   <a class="nav-link" href="{{route('user.logout')}}">Deconnexion</a>
                     @else
                     <a class="nav-link" href="{{route('user.login')}}">Connexion</a>
                 @endif
               </li>
                </ul>
          </ul>
        </div>
     
    </div>
  </div>
</nav>
