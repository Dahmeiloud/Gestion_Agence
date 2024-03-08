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

                        <h2  class="display-4"> Chauffeus  </h2>
                        <div class="card-body">
                            <a href="{{ url('/chauffeurs/create')  }}"  class="btn btn-primary " title="Ajouter une agence">
                             Ajouter un chauffeur
                            </a>
                            <form action="{{ url('/chauffeurs') }}" method="GET" class="form-inline float-right">
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
                                      <th scope="col">Nom </th>
                                      <th scope="col">NumeroTelephone </th>
                                      <th scope="col">Code</th>
                                      <th scope="col">Nom agenece</th>
                                      <th scope="col">Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    @foreach ($chauffeurs as $item )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nom }}</td>
                                        <td>{{ $item->Numero_telephone}}</td>
                                        <td>{{ $item->code}}</td>
                                        <td>{{ optional($item->agence)->nom }}</td>

                                        <td>
                                            <div class="row">
                                                <div class="col-sm">
                                                    <a href="{{ route('chauffeurs.show' , $item) }}" title="voir Chauffaire "><button class="btn btn-info btn-sm"> <i class="fa fa-eye" aria-hidden="true"></i>Voir  </button></a>
                                                </div>

                                                <div class="col-sm">
                                                <a href="{{ route('chauffeurs.edit' , $item ) }}" title="Edit Chauffaire"><button class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Modifier</button></a>

                                                </div>

                                                <div class="col-sm">
                                                    <form method="POST" action="{{ route('chauffeurs.destroy', $item) }}" accept-charset="UTF-8" style="display:inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id }}, '{{ $item->nom }}')">
                                                            <i class="fa fa-solid fa-trash"></i> Supprimer
                                                        </button>
                                                    </form>
                                                </div>
                                                <script>
                                                    function confirmDelete(id, nom) {
                                                        Swal.fire({
                                                            title: 'Êtes-vous sûr de vouloir supprimer le chauffeur ' + nom + ' ?',
                                                            icon: 'warning',
                                                            showCancelButton: true,
                                                            confirmButtonText: 'Oui, supprimer',
                                                            cancelButtonText: 'Annuler'
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                document.querySelector('form[action="' + '{{ route('chauffeurs.destroy', $item) }}' + '"]').submit();
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

