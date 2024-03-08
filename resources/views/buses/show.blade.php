@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4>Détails du bus</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>
                        <label for="matricule" class="col-form-label">Matricule :</label>
                    </th>
                    <td>{{ $bus->matricule }}</td>
                </tr>
                <tr>
                    <th>
                        <label for="code" class="col-form-label">Code :</label>
                    </th>
                    <td>{{ $bus->code }}</td>
                </tr>
                <tr>
                    <th>
                        <label for="nom" class="col-form-label">Chauffeur :</label>
                    </th>
                    <td>{{ $chauffeur->nom }}</td>
                </tr>
                <tr>
                    <th>
                        <label for="code" class="col-form-label">Code  Chauffeur :</label>
                    </th>
                    <td>{{ $chauffeur->code  }}</td>
                </tr>

                <tr>
                    <th>
                        <label for="Numero_telephone " class="col-form-label">Téléphone :</label>
                    </th>
                    <td>{{ $chauffeur->Numero_telephone  }}</td>
                </tr>
                <tr>
                    <th>
                        <label for="nom" class="col-form-label">Agence :</label>
                    </th>
                    <td>{{ $agence->nom }}</td>
                </tr>
                <tr>
                    <th>
                        <label for="localisation" class="col-form-label">Localisation :</label>
                    </th>
                    <td>{{ $agence->localisation }}</td>
                </tr>
            </table>
        </div>
    </div></div>
        </div>
    </div>
@endsection
