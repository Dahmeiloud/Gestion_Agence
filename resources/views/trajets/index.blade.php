@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12">
                {{-- <div class="card"> --}}
                    <div class="card-header">
                        <a href="{{ url('/dashboard') }}" class="btn btn-info mx-sm-3 mb-2">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Retour
                        </a>
                        {{-- <div class="jumbotron"> --}}
                        <h2  class="display-4"> Trajets  </h2>
                        <div class="card-body">
                            <a href="{{ url('/trajets/create')  }}"  class="btn btn-primary " title="Ajouter une agence">
                             Ajouter une trajet
                            </a>
                            <form action="{{ url('/trajets') }}" method="GET" class="form-inline float-right">
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="search" class="sr-only">Recherche</label>
                                    <input type="text" class="form-control" id="search" placeholder="Recherche" name="search">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Rechercher</button>
                            </form>
                        </div>
                    </div>

                        <div class="table">
                            <table class="table">
                                <thead  class=" table-dark" >
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Lieu de departt </th>
                                      <th scope="col">Lieu d'arrive</th>
                                      <th scope="col">Prix </th>
                                      <th scope="col">Adresse</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($trajets as $item )
                                       <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $item->lieu_departe }}</td>
                                          <td>{{ $item->lieu_arivee}}</td>
                                          <td>{{ $item->prix}}</td>
                                          <td>{{ $item->adresse}}</td>

                                        <td>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <a href="{{ route('trajets.show' , $item) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Voir </button></a>
                                                </div>

                                                <div class="col-sm">
                                                <a href="{{ route('trajets.edit' , $item) }}" title="Edit Student"><button class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Modifier </button></a>

                                                </div>
                                                <div class="col-sm">
                                                    <form action="{{ route('trajets.destroy', $item) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $item->id }}, '{{ $item->nom }}')">
                                                            <i class="fa fa-solid fa-trash"></i> Supprimer
                                                        </button>
                                                    </form>
                                                </div> <script>
                                                    function confirmDelete(id, nom) {
                                                        Swal.fire({
                                                            title: 'Êtes-vous sûr de vouloir supprimer le \ trajet ' + nom + ' ?',
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonText: 'Oui, supprimer',
                                                            cancelButtonText: 'Annuler'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.getElementById('delete-form-' + id).submit();
                                                            }
                                                        });
                                                    }
                                                    </script>
                                            </div>

                                        </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

