<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

@yield('styles')
    <title>Rent Bike</title>
  </head>
  <body>
   <div class="container">
   <div class="row">
    <div class="col-md-6 mx-auto my-4">
        @include('includes.messages')
   </div>
   <div class="container my-3 border border-primary" style="
    padding: 0;
">
   <div class="header h-100 bg-primary rounded shadow-sm">
   <ul class="nav">
     <li class="nav-item">
       <a class="nav-link text-white" href="#">Acceuil</a>
     @auth
        </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{route('users.profile',auth()->user()->id)}}">{{auth()->user()->name}}</a>
          </li>
          <li class="nav-item">
<form action="{{route('users.logout')}}"method="post" >


  <button style="background:transparent;border:none"
  type="submit" class="nav-link text-white">Déconnexion</button>
  </form>
  </li>
      @else
</li>
     <li class="nav-item">
       <a class="nav-link text-white" href="{{route('users.register')}}">Inscription</a>
     </li>
     <li class="nav-item">
       <a class="nav-link text-white" href="{{route('users.login')}}">Connexion</a>
     </li>
     @endauth

   </ul>
   </div>
   </div>
   @yield('content')
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    @yield('scripts')
  </body>
</html>
