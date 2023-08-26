@extends('layouts.app')

@push('extra-css')


@endpush
@section('contenu_page')

<div class="row">
  
     <div class="col-12">
        <form method="POST" action="{{ route('album.store') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Prénom et Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Entrer le prénom & nom" required>
            </div>
            <div class="form-group">
                <label>Téléphone</label>
                <input type="tel" name="telephone" class="form-control" placeholder="Entrer le telephone" required>
            </div>
            <div class="form-group">
                <label>Fonction</label>
                <input type="text" name="fonction" class="form-control" placeholder="Entrer la fonction" required>
            </div>
         
            <div class="form-group">
                <label>Choose Images</label>
                <input type="file" name="images" class="form-control">
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Vallider</button>
        </form>
    
     </div>


</div>

@endsection
