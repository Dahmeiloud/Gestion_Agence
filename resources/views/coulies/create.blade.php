@extends('layouts.app')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-6">
<div class="card" >
    <div class="card-header">
        <h4 class="modal-title" > Ajouter  Niveau Coulie </h4>
        </div>

      <div class="card-body"  style="margin:10px">

            <form  action="{{ url('coulies') }}" method="post">
            @csrf
            <label class="col-sm-4 col-form-label">Code :</label><br>
            <input type="text" name="code" id="code" class="form-control"><br>
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
