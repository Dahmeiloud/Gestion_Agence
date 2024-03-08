@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <h4>Modifier un bus</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('buses.update', $bus->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="matricule">Matricule</label>
                    <input type="text" class="form-control" id="matricule" name="matricule" value="{{ $bus->matricule }}">
                </div>
                <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" value="{{ $bus->code }}">
                </div>
                <div class="form-group">
                    <label for="chauffeur_id">Chauffeur</label>
                    <select class="form-control" id="chauffeur_id" name="chauffeur_id">
                        @foreach ($chauffeurs as $chauffeur)
                            <option value="{{ $chauffeur->id }}" @if ($bus->chauffeur_id == $chauffeur->id) selected @endif>{{ $chauffeur->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="agence_id">Agence</label>
                    <select class="form-control" id="agence_id" name="agence_id">
                        @foreach ($agences as $agence)
                            <option value="{{ $agence->id }}" @if ($bus->agence_id == $agence->id) selected @endif>{{ $agence->nom }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection
