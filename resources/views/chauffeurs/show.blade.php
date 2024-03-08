@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card" >
            <div class="card-header">
                <h4 class="modal-title">Détails du chauffeur</h4>
            </div>

    <div class="card-body" >
        <table class="table table-striped">
          <tr>
        <th>
            <label for="nom" class="col-form-label">Nom :</label>
        </th>
        <td>{{ $chauffeur->nom  }}</td>
          </tr>
          <tr>
            <th>
                <label for="Numero_telephone" class="col-form-label">Numéro de téléphone :</label>
            </th>
            <td>{{ $chauffeur->Numero_telephone }}</td>
          </tr>
          <tr>
            <th>
                <label for="code" class="col-form-label"> Code :</label>
            </th>
            <td> {{ $chauffeur->code }}</td>
          </tr>

          <tr>
            <th>
                <label for="code" class="col-form-label">Agence</label>
            </th>
            <td>  {{ $chauffeur->agence->nom }}</td>
          </tr>


        </table>
    </div>
</div>

@stop
