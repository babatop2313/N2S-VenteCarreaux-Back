@extends('layouts.app')

@push('extra-css')
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

<script>

tinymce.init({
  selector: 'textarea#default'
});

</script>

@endpush
@section('contenu_page')

<div class="row">
  
     <div class="col-12">
        <form method="POST" action="{{ route('save_edit_blog') }}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="{{ $blog->status }}" name="status">
            <input type="hidden" value="{{ $blog->id }}" name="id">
            <div class="form-group">
                <label>Titre</label>
                <input type="text" name="titre" value="{{ $blog->titre }}" class="form-control" placeholder="Entrer un titre" required>
            </div>
          
            <div class="form-group">
                <label>Catégorie</label>
                <Select class="form-control" name="categorie" value="{{ $blog->categorie }}" aria-label="selectionner un categorie" style="opacity:15 !important;">
                    <option value="" selected="selected">Selectionner un catégorie</option>
                    <option value="Social">Social</option>
                    <option value="Sante">Sante</option>
                    <option value="Alimentation">Alimentation</option>
                    <option value="Education">Education</option>
                    <option value="Sport">Sport</option>
                    <option value="Culture">Culture</option>
                    <option value="Religion">Religion</option>
                </Select>
            </div>
            <div class="form-group">
                <label>Description</label>
                 <textarea name="body"  id="default" cols="30" rows="10" class="form-control">
                     {!! $blog->body !!}
                  
                 </textarea>
            </div>
            <div class="form-group">
                <label>Choose Images</label>
                <input type="file" name="images[]" class="form-control" multiple >
               
            </div>
            <div>
                @foreach ($blog->blog_images as $item)
                     <img src="/uploads/{{ $item->blog_image }}" alt=""  style="width:80px;">
                @endforeach
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Modifier</button>
        </form>
    
     </div>


</div>

@endsection
