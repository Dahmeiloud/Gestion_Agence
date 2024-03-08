@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card">
    <div class="card-header">
        <h4 class="modal-title">Modifier un niveau de coulie</h4>
    </div>
    <div class="card-body" >
        <form action="{{ route('coulies.update', $coulie->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="code">Code :</label>
                <input type="text" name="code" id="code" class="form-control" value="{{ $coulie->code }}" required>
            </div>
            <div class="form-group">
                <label for="agence_id">Agence :</label>
                <select name="agence_id" id="agence_id" class="form-control" required>
                    <option value="">Choisissez une agence</option>

                    @foreach ($agences as $agence)
                    <option value="{{ $agence->id }}" @if( $coulie->agence_id == $agence->id) selected @endif>{{ $agence->nom }}</option>
                @endforeach

            </select>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Modifier" class="btn btn-primary">
                              </div>
                        </form>
                    </div>

</div>
@endsection
