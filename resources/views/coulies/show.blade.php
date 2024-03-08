@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Coulie  : </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <th>
                                    <label for="code" class="col-form-label">Code :</label>
                                </th>
                                <td>{{ $coulie->code }}</td>
                            </tr>

                            <tr>
                                <th>
                                    <label for="agence" class="col-form-label">Agence :</label>
                                </th>
                                <td>{{ $coulie->agence->nom }}</td>
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
