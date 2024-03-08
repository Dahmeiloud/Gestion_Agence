@extends('layouts.app')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-6">
<div class="card" >
    <div class="card-header">
        <h4 class="modal-title" > Ajouter niveau chauffeurs </h4>
        </div>

      <div class="card-body"  >

            <form  action="{{ url('chauffeurs')  }}" method="post">
           @csrf
            <label class="col-sm-4 col-form-label">Nom :</label><br>
            <input type="text" name="nom" id="nom" class="form-control"><br>
            <label class="col-sm-4 col-form-label"> NumeroTelephone :</label><br>
            <input type="text" name="Numero_telephone" id="Numero_telephone" class="form-control"><br>
            <label class="col-sm-4 col-form-label"> Code : </label><br>
            <input name='code' type="text" class="form-control" id="code"><br>
            <select name="agence_id" id="agence_id">
                <option value="0">Choisie une agence </option>
                @foreach ($agences as $item )
                <option  value="{{$item->id}}">{{$item->nom}}</option>
                @endforeach

            </select><br><br>
            <input type="submit"  value="Enregistre" class="btn btn-success"><br>

            </form>

      </div>
</div>

@stop
