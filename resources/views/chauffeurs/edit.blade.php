@extends('layouts.app')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-6">
<div class="card" >
        <div class="card-header">
            <h4 class="modal-title">Modifier le chauffeur</h4>
        </div>

        <div class="card-body" style="margin:10px">

            <form action="{{ route('chauffeurs.update', ['chauffeur'=> $chauffeur->id ])}}"  method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $chauffeur->id }}"><br>
                <label class="col-sm-2 col-form-label">Nom :</label><br>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ $chauffeur->nom }}"><br>

                <label class="col-sm-2 col-form-label">Numéro de téléphone :</label><br>
                <input type="text" name="Numero_telephone" id="Numero_telephone" class="form-control" value="{{ $chauffeur->Numero_telephone }}"><br>

                <label class="col-sm-2 col-form-label">Code :</label><br>
                <input type="text" name="code" id="code" class="form-control" value="{{ $chauffeur->code }}"><br>

                <label class="col-sm-2 col-form-label">Agence :</label><br>
                <select name="agence_id" id="agence_id" class="form-control">
                    <option value="">Choisir une agence</option>
                    @foreach ($agences as $agence)
                        <option value="{{ $agence->id }}" {{ $agence->id == $chauffeur->agence_id ? 'selected' : '' }}>
                            {{ $agence->nom }}
                        </option>
                    @endforeach
                </select><br>

                <input type="submit" value="Enregistrer" class="btn btn-success"><br>
            </form>
        </div>
    </div>

@endsection
