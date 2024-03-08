@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
<div class="card" >
    <div class="card-header">
        <h4 class="modal-title">Détails du client</h4>
    </div>

    <div class="card-body" style="margin: 10px">
        <table class="table">
            <tbody>
                <tr>
                    <th>Nom:</th>
                    <td>{{ $client->nom }}</td>
                </tr>
                <tr>
                    <th>Numéro de téléphone:</th>
                    <td>{{ $client->numero_telephone }}</td>
                </tr>
                <tr>
                    <th>Adresse:</th>
                    <td>{{ $client->adresse }}</td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('clients.index') }}" class="btn btn-primary">Retour à la liste des clients</a>
    </div>
</div>

@stop
