<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Location Velo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#" style="width: 7%">
        <img src="{{ asset('img/logo-velo.png') }}" alt="" style="width: 100%">
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            @auth
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('events.create') }}">Ajouter un Évenement </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('events.index') }}">Liste des Évenements</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('participations.index') }}">Mes Participations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reclamation.index') }}">Liste des Reclamations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categorie.index') }}">Liste des Categories</a>
            </li>

            <li class="nav-item">
                <form action="{{route('users.logout')}}" method="get">
                    <button style="background:transparent;border:none" type="submit" class="nav-link text-white">
                        Se Déconnecter
                    </button>
                </form>
            </li>
            @else
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('users.register')}}">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{route('users.login')}}">Connexion</a>
                </li>
            @endauth

        </ul>
    </div>
</nav>
<div class="container mt-5">
    @auth
    @yield('content')
    @endauth
</div>

</body>
</html>
