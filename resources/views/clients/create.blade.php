@extends('layouts.app')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-6">
<div class="card" >
    <div class="card-header">
        <h4 class="modal-title" > Ajouter  Niveau client </h4>
        </div>

      <div class="card-body"  style="margin:10px">

            <form  action="{{ url('clients') }}" method="post">
            @csrf
            <label class="col-sm-4 col-form-label">Nom :</label><br>
            <input type="text" name="nom" id="nom" class="form-control"><br>
            <label class="col-sm-4 col-form-label"> Numerou Telephone :</label><br>
            <input type="text" name="numero_telephone" id="numero_telephone" class="form-control"><br>
            <label class="col-sm-4 col-form-label"> Adresse : </label><br>
            <input type="text" name="adresse" id="adresse" class="form-control"><br>

            <input type="submit"  value="Enregistre" class="btn btn-success"><br>

            </form>

      </div>
</div>

@stop
