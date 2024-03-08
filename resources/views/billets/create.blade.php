@extends('layouts.app')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-6">
<div class="card" >
    <div class="card-header">
        <h4 class="modal-title">Ajouter un billet</h4>
    </div>

    <div class="card-body"  style="margin:10px">

        <form action="{{ url('billets') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="code">Code :</label>
                <input type="text" name="code" id="code" class="form-control"  placeholder="Entre Code de billet ">
            </div>

            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="text" name="prix" id="prix" class="form-control" placeholder="Entre Prix  de trajet ">
            </div>

            <div class="form-group">
                <label for="agence_id">Agence :</label>
                <select name="agence_id" id="agence_id" class="form-control">
                    <option value="">Choisir une agence</option>
                    @foreach($agences as $agence)
                        <option value="{{ $agence->id }}">{{ $agence->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="client_id">Client :</label>
                <select name="client_id" id="client_id" class="form-control">
                    <option value="">Choisir un client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="trajet_id">Lieu_depart :</label>
                <select name="trajet_id" id="trajet_id" class="form-control">
                    <option value="">Choisir un trajet</option>
                    @foreach($trajets as $trajet)
                        <option value="{{ $trajet->id }}">{{ $trajet->lieu_departe }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="trajet_id">Lieu_ arrive :</label>
                <select name="trajet_id" id="trajet_id" class="form-control">
                    <option value="">Choisir un trajet</option>
                    @foreach($trajets as $trajet)

                        <option value="{{ $trajet->id }}">{{ $trajet->lieu_arivee }}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Enregistrer" class="btn btn-success">
        </form>
    </div>
</div>
    </div>
</div>
@stop
