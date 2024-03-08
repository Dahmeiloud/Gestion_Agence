@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
<div class="card" >
    <div class="card-header">
        <h4 class="modal-title">Modifier un billet</h4>
    </div>

    <div class="card-body" style="margin:10px">
        <form action="{{ route('billets.update', $billet->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="code">Code :</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ $billet->code }}">
            </div>

            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="text" name="prix" id="prix" class="form-control" value="{{ $billet->prix }}">
            </div>

            <div class="form-group">
                <label for="agence_id">Agence :</label>
                <select name="agence_id" id="agence_id" class="form-control">
                    @foreach($agences as $agence)
                        <option value="{{ $agence->id }}" @if($billet->agence_id == $agence->id) selected @endif>{{ $agence->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="client_id">Client :</label>
                <select name="client_id" id="client_id" class="form-control">
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" @if($billet->client_id == $client->id) selected @endif>{{ $client->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="trajet_id">Trajet :</label>
                <select name="trajet_id" id="trajet_id" class="form-control">
                    @foreach($trajets as $trajet)
                        <option value="{{ $trajet->id }}" @if($billet->trajet_id == $trajet->id) selected @endif>{{ $trajet->nom }}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Enregistrer" class="btn btn-success">
        </form>
    </div>
</div>

@stop
