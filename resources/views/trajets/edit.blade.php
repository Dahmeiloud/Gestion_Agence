@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
<div class="card" >
    <div class="card-header">
        <h4>Modifier Trajet</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('trajets.update', ['trajet' => $trajet->id] ) }}" method="post">
            @csrf
            @method('PUT')
            <label class="col-sm-4 col-form-label">Lieu de départ :</label><br>
            <input type="text" name="lieu_depart" id="lieu_depart" class="form-control" value="{{ $trajet->lieu_departe }}"><br>
            <label class="col-sm-4 col-form-label">Lieu d'arrivée :</label><br>
            <input type="text" name="lieu_arrivee" id="lieu_arrivee" class="form-control" value="{{ $trajet->lieu_arivee }}"><br>
            <label class="col-sm-4 col-form-label">Prix :</label><br>
            <input type="text" name="prix" id="prix" class="form-control" value="{{ $trajet->prix }}"><br>
            <label class="col-sm-4 col-form-label">Adresse :</label><br>
            <input type="text" name='adresse' id="adresse" class="form-control" value="{{ $trajet->adresse }}"><br>

            <label class="col-sm-4 col-form-label">Agence :</label><br>
            <select name="agence_id" id="agence_id">
                @foreach ($agences as $agence)
                <option value="{{ $agence->id }}" {{ $trajet->agence_id == $agence->id ? 'selected' : '' }}>{{ $agence->nom }}</option>
                @endforeach
            </select><br><br>

            <input type="submit" value="Enregistrer" class="btn btn-success"><br>
        </form>
    </div>
</div>

@endsection
