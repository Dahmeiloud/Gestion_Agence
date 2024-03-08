@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Modifier une agence</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('agences.update', ['agence' => $agence->id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" id="id" value="{{ $agence->id }}">

                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" id="nom" value="{{ $agence->nom }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input type="email" name="email" id="email" value="{{ $agence->email }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" id="password" value="{{ $agence->password }}" class="form-control">
                    </div>



                    <div class="form-group">
                        <label for="localisation">Localisation :</label>
                        <input type="text" name="localisation" id="localisation" value="{{ $agence->localisation }}" class="form-control">
                    </div>

                    <input type="submit" value="Enregistrer" class="btn btn-success">
                </form>
            </div>
        </div>
    </div>
</div>
@stop
