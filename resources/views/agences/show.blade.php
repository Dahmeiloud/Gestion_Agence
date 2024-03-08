@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informations de l'agence</h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tr>
                                    <th>
                                        <label for="nom" class="col-form-label">Nom :</label>
                                    </th>
                                    <td> {{ $agence->nom }}</td>
                                </tr>

                                <tr>
                                    <th>
                                        <label for="email" class="col-form-label">Email :</label>
                                    </th>
                                    <td> {{ $agence->email }}</td>
                                </tr>
                                <tr>
                                    <th>
                                        <label for="localisation" class="col-form-lable">Localisation :</label>
                                    </th>
                                    <td> {{ $agence->localisation }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
