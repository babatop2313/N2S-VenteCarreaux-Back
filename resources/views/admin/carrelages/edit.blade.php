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
        <form method="POST" action="{{ route('save_edit_carrelage') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="{{ $carrelage->status }}" name="status">
            <input type="hidden" value="{{ $carrelage->id }}" name="id">
            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" value="{{ $carrelage->nom }}" class="form-control" placeholder="Entrer un nom" required>
            </div>
          
            <div class="form-group">
                <label>Catégorie</label>
                <Select class="form-control" name="categorie" aria-label="selectionner un categorie" style="opacity:15 !important;">
                    <option value="{{ $carrelage->categorie }}" selected="selected">{{ $carrelage->categorie }}</option>
                        <option value="céramique">Céramique</option>
                        <option value="pierre">Pierre naturelle</option>
                </Select>
            </div>
            <div class="form-group">
                <label>Description</label>
                 <textarea name="description"  id="default" cols="30" rows="10" class="form-control">
                     {!! $carrelage->description !!}
                  
                 </textarea>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label>Quantité</label>
                    <input type="number" name="qte" value="{{ $carrelage->qte }}" class="form-control" placeholder="Entrer la quantité" required>
                </div>
                <div class="form-group col-6">
                    <label>Prrix unitaire</label>
                    <input type="number" name="prix" value="{{ $carrelage->prix }}" class="form-control" placeholder="Entrer le prix" required>
                </div>
            </div> 
            <div class="form-group">
                <label>Choose Images</label>
                <input type="file" name="images[]" class="form-control" multiple >
               
            </div>
            <div>
                @foreach ($carrelage->blog_images as $item)
                     <img src="/uploads/{{ $item->blog_image }}" alt=""  style="width:80px;">
                @endforeach
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    
     </div>


</div>

@endsection
