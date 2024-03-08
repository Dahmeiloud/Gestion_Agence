@extends('layouts.app')
@section('content')


<div class="row justify-content-center">
    <div class="col-md-6">
<div class="card" >
    <div class="card-header">
        <h4 class="modal-title" > Ajouter un nauvelle Agence  </h4>
        </div>

        <div class="card-body" style="margin:10px">
            <form action="{{ url('agences') }}" method="post" enctype="multipart/form-data">
                @csrf
                <label class="col-sm-4 col-form-label">Nom :</label><br>
                <input type="text" name="nom" id="nom" class="form-control" placeholder="Entrez le nom de l'agence"><br>

                <label class="col-sm-4 col-form-label">Email :</label><br>
                <input type="email" name="email" id="email" class="form-control" placeholder="Entrez l'email"><br>

                <label class="col-sm-4 col-form-label">Mot de passe :</label><br>
                <input type="password" name="password" id="password" class="form-control" placeholder="Entrez le mot de passe"><br>


                <label class="col-sm-4 col-form-label">Localisation :</label><br>
                <input type="text" name="localisation" id="localisation" class="form-control" placeholder="Entrez la localisation"><br>

                <input type="submit" value="Enregistrer" class="btn btn-success"><br>
            </form>
        </div>
    </div>
</div>
</div>

@stop
