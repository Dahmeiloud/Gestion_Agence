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
                    <h2 class="display-4">Billets</h2>
                    <div class="card-body">
                        <a href="{{ url('/billets/create') }}" class="btn btn-primary" title="Ajouter un billet">
                            Ajouter un billet
                        </a>
                        <form action="{{ url('/billets') }}" method="GET" class="form-inline float-right">
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="search" class="sr-only">Recherche</label>
                                <input type="text" class="form-control" id="search" placeholder="Recherche" name="search" value="{{ $search ?? '' }}">
                                @if (isset($billets))
                                    <span class="badge badge-info">{{ $billets->count() }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Rechercher</button>
                        </form>
                    </div>
                </div>
                <div class="table">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Prix</th>
                                <th>Agence</th>
                                <th>Client</th>
                                <th>Lieu de part </th>
                                <th>Lieu d'arrive </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($billets as $billet)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $billet->code }}</td>
                                    <td>{{ $billet->prix }}</td>
                                    <td>{{ $billet->agence->nom }}</td>
                                    <td>{{ $billet->client->nom }}</td>
                                    <td>{{ $billet->trajet->lieu_departe }}</td>
                                    <td>{{ $billet->trajet->lieu_arivee }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm">
                                                <a href="{{ route('billets.show', $billet) }}" title="Voir le billet">
                                                    <button class="btn btn-info btn-sm">
                                                        <i class="fa fa-eye" aria-hidden="true"></i> Voir                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <a href="{{ route('billets.edit', $billet) }}" title="Modifier le billet">
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-sm">
                                        <form action="{{ route('billets.destroy', $billet) }}" method="POST" id="delete-form-{{ $billet->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $billet->id }}, '{{ $billet->code }}')">
                                                <i class="fa fa-solid fa-trash"></i> Supprimer
                                            </button>
                                        </form>
                                    </div>
                                    <script>
                                        function confirmDelete(id, code) {
                                            Swal.fire({
                                                title: 'Êtes-vous sûr de vouloir supprimer le billet avec le code ' + code + ' ?',
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
                                    {{-- <div class="col-sm">
                                        <button class="btn btn-primary btn-sm" onclick="window.print()">
                                            <i class="fa fa-print" aria-hidden="true"></i> Imprimer
                                        </button>
                                    </div> --}}
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
