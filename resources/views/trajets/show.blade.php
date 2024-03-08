@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Détails du trajet</div>
                    <div class="panel-body">

                        <div class="card" style="margin:20px;">
                            <div class="card-header">Agence</div>
                            <div class="card-body">
                                {{-- @foreach ($trajet as $t) --}}
                                    <h5 class="card-title">Lieu de départ : {{  $trajets->lieu_departe }}</h5>
                                    <h5 class="card-title">Lieu d'arrivée : {{ $trajets->lieu_arrivee }}</h5>
                                    <p class="card-text">Prix : {{ $trajets->prix }}</p>
                                    <p class="card-text">Adresse : {{  $trajets->adresse }}</p>
                                    @if ($t->agence)
                                        <p class="card-text">Agence : {{ $trajets->agence->nom }}</p>
                                    @else
                                        <p class="card-text">Aucune agence associée</p>
                                    @endif
                                {{-- @endforeach --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
