@extends('layouts.app')

@push('extra-css')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>

tinymce.init({
  selector: 'textarea#default'
});

</script>

@endpush
@section('content')

<div class="row">
  
     <div class="col-12">
        <form method="POST" action="{{ route('save_carrelage') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" class="form-control" placeholder="Entrer un nom" required>
            </div>
          
            <div class="row">
                <div class="form-group col-6">
                    <label>Catégorie</label>
                    <Select class="form-control" name="categorie" aria-label="selectionner un categorie" style="opacity:15 !important;">
                        <option value="" selected="selected">Selectionner une catégorie</option>
                        <option value="céramique">Céramique</option>
                        <option value="pierre">Pierre naturelle</option>
                    </Select>
                </div>
                <div class="form-group col-6">
                    <label>Visibilité</label>
                    @if (session('the_user')[0]->profil == 'admin')
                        <Select class="form-control" name="visibilite" aria-label="visibilite" style="opacity:15 !important;">
                            <option value="public">Public</option>
                        </Select>
                    @else
                        <Select class="form-control" name="visibilite" aria-label="visibilite" style="opacity:15 !important;">
                            <option value="prive">Privé</option>
                        </Select>
                    @endif
                </div>
            </div> 
            <div class="form-group">
                <label>Description</label>
                 <textarea name="description"  id="default" cols="30" rows="3" class="form-control"></textarea>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label>Quantité</label>
                    <input type="number" name="qte" class="form-control" placeholder="Entrer la quantité" required>
                </div>
                <div class="form-group col-6">
                    <label>Prix unitaire</label>
                    <input type="number" name="prix" class="form-control" placeholder="Entrer le prix" required>
                </div>
            </div> 
            <div class="form-group">
                <label>Choose Images</label>
                <input type="file" name="images[]" class="form-control" multiple >
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Vallider</button>
        </form>
    
     </div>


</div>

@endsection
