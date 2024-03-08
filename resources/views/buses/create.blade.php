@extends('layouts.app')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-6">
<div class="card" >
    <div class="card-header">Create New Bus </div>

      <div class="card-body">

            <form  action="{{ url('buses')  }}" method="post">
            @csrf
            <label>Matricule :</label><br>
            <input type="text" name="matricule" id="matricule" class="form-control"><br>
            <label>Code :</label><br>
            <input type="text" name="code" id="code" class="form-control"><br>
            <select name="agence_id" id="agence_id">
                <option value="0">Choisir une agence </option>
                @foreach ($agences as $item )
                <option  value="{{$item->id}}">{{$item->nom}}</option>
                @endforeach

            </select><br><br>
            <select name="chauffeur_id" id="chauffeur_id">
                <option value="0">Choisir un chauffeur  </option>
                @foreach ($chauffeurs as $item )
                <option  value="{{$item->id}}">{{$item->nom}}</option>
                @endforeach

            </select><br><br>
            <input type="submit"  value="Enregistrer" class="btn btn-success"><br>

            </form>

      </div>
</div>

@endsection
