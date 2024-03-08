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
                        <h2  class="display-4"> Bus </h2>
                        <div class="card-body">
                            <a href="{{ url('/buses/create')  }}"  class="btn btn-primary " title="Ajouter une agence">
                             Ajouter une  bus
                            </a>
                            <form action="{{ url('/buses') }}" method="GET" class="form-inline float-right">
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
                                <thead   class=" table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Matricule</th>
                                        <th>Code </th>
                                        <th>Nom d'agence </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buses as $item )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->matricule }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>{{ $item->agence ? $item->agence->nom : '' }}</td>
                                        <td>
                                              <div class="row">
                                                    <div class="col-sm">
                                                         <a href="{{ route('buses.show' , $item) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>Voir  </button></a>
                                                    </div>
                                                    <div class="col-sm">
                                                        <a href="{{ route('buses.edit' , $item) }}" title="Edit Student"><button class="btn btn-success btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>  Modifier</button></a>
                                                    </div>
                                                    <div class="col-sm">
                                                        <form method="POST" action="{{ route('buses.destroy', $item) }}" accept-charset="UTF-8" style="display:inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id }}, '{{ $item->matricule }}')">
                                                                <i class="fa fa-solid fa-trash"></i> Supprimer
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <script>
                                                        function confirmDelete(id, matricule) {
                                                            Swal.fire({
                                                                title: 'Êtes-vous sûr de vouloir supprimer le bus avec la matricule ' + matricule + ' ?',
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonText: 'Oui, supprimer',
                                                                cancelButtonText: 'Annuler'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    document.querySelector('form[action="' + '{{ route('buses.destroy', $item) }}' + '"]').submit();
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
    </div>

@endsection
