@extends('layouts.app')
@section('title')
     Listes des Agences
@endsection

@section('content_header')
    <h1>Listes des Agences</h1>
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-12">
                    <div class="card-header">
                        <a href="{{ url('/dashboard') }}" class="btn btn-info mx-sm-3 mb-2">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Retour
                        </a>

                        <h2  class="display-4"> Agences </h2>
                        <div class="card-body">
                            <a href="{{ url('/agences/create')  }}"  class="btn btn-primary " title="Ajouter une agence">
                             Ajouter une agence
                            </a>
                            <form action="{{ url('/agences') }}" method="GET" class="form-inline float-right" >
                                <div class="form-group mr-3">
                                    <input type="text" name="q" value="{{ $query }}" class="form-control" placeholder="Recherche...">
                                </div>
                                <button type="submit" class="btn btn-primary">Rechercher</button>
                            </form>
                        </div>
                    </div><br>

                        <div class="table">
                            <table class="table">
                                <thead   class=" table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Nom</th>
                                        <th>Email </th>

                                        <th>Localisation</th>
                                        <th w-20>Actions</th>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ( $agences as $item )
                                        <tr>
                                             <td>{{ $loop->iteration }} </td>
                                            <td>{{ $item->nom }} </td>
                                            <td>{{ $item->email }} </td>

                                            <td>{{ $item->localisation }} </td>


                                        <td>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <a href="{{ route('agences.show' , $item) }}" title="Voir Agences "><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>  Voir  </button></a>
                                                </div>

                                                <div class="col-sm">
                                                <a href="{{ route('agences.edit', $item) }}" title="Edit agences "><button class="btn btn-success btn-sm"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Modifier</button></a>

                                                </div>

                                                    <div class="col-sm">
                                                        <form action="{{ route('agences.destroy', $item) }}" method="POST" id="delete-form-{{ $item->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $item->id }}, '{{ $item->nom }}')">
                                                                <i class="fa fa-solid fa-trash"></i> Supprimer
                                                            </button>
                                                        </form>
                                                </div>
                                                <script>
                                                    function confirmDelete(id, nom) {
                                                        Swal.fire({
                                                            title: 'Êtes-vous sûr de vouloir supprimer l\'agence ' + nom + ' ?',
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
