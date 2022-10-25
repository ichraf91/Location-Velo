<!DOCTYPE html>
<html>
<head>
    <title>Location Velo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<h1 style="width: 100%; text-align: center">Participation pour {{$event->nomEvent}}</h1>
<br>
<p>Date de création : {{ $date }}</p>
<br>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Détails de l'événement</b></div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Nom Evénement :</b></label>
            <div class="col-sm-6">
                {{ $event->nomEvent }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Lieu Evénement:</b></label>
            <div class="col-sm-6">
                {{ $event->lieuEvent }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Type :</b></label>
            <div class="col-sm-6">
                {{ $event->typeEvent }}
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Détails du participant</b></div>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Nom :</b></label>
            <div class="col-sm-6">
                {{ $user->name }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Email :</b></label>
            <div class="col-sm-6">
                {{ $user->email }}
            </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Tel :</b></label>
            <div class="col-sm-6">
                {{ $user->tel }}
            </div>
        </div>
    </div>
</div>
<div>
    <img src="data:image/png;base64, {!! base64_encode(QrCode::size(150)->generate('event id : ' . $event->id .' user id : ' . $user->id)) !!}" style="margin-left: 40%; margin-top: 5%">
</div>
</body>
</html>
