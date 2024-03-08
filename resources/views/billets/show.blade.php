@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Billet de : {{ $billet->client->nom }}</div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>
                                    <label for="code" class="col-form-label">Code :</label>
                                </th>
                                <td>{{ $billet->code }}</td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="client" class="col-form-label">Client :</label>
                                </th>
                                <td>{{ $billet->client->nom }}</td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="prix" class="col-form-label">Prix :</label>
                                </th>
                                <td>{{ $billet->prix }} N-UM</td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="agence" class="col-form-label">Agence :</label>
                                </th>
                                <td>{{ $billet->agence->nom }}</td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="depart" class="col-form-label">Lieu de départ :</label>
                                </th>
                                <td>{{ $billet->trajet->lieu_departe }}</td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="arrivee" class="col-form-label">Lieu d'arrivée :</label>
                                </th>
                                <td>{{ $billet->trajet->lieu_arivee }}</td>
                            </tr>

                        </table>
                        <div class="row justify-content-right">
                            <div class="col-sm-auto">
                                <button class="btn btn-primary" onclick="window.print()">
                                    <i class="fa fa-print" aria-hidden="true"></i> Imprimer
                                </button>
                            </div>
                    </div>

                    </div>
                </div>

            </div>

        </div>


    </div>
@endsection
