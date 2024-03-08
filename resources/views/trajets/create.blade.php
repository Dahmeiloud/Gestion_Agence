@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
   <div class="card"  >
    <div class="card-header">
        <h4 class="modal-title" > Ajouter Niveau Trajet </h4>
        </div>

      <div class="card-body"  style="margin:10px">

            <form  action="{{ url('trajets')  }}" method="post">
           @csrf
            <label class="col-sm-4 col-form-label">Lieu de depart </label><br>
            <input type="text" name="lieu_departe" id="lieu_departe" class="form-control" placeholder="Entre votre lieu de depart "><br>
            <label class="col-sm-4 col-form-label"> Lieu de d'arrive :</label><br>
            <input type="text" name="lieu_arivee" id="lieu_arivee" class="form-control" placeholder="Entre votre lieu d'arrive"><br>
            <label class="col-sm-4 col-form-label"> Prix  :</label><br>
            <input type="text" name="prix" id="prix" class="form-control" placeholder="Entre votre Prix "><br>
            <label class="col-sm-4 col-form-label"> Adresse : </label><br>
            <input  type="text" name='adresse'  id="adresse" class="form-control" placeholder="Entre votre adrese "><br>

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
    </div>
</div>


@stop
