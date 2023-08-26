@extends('layouts.apis')

{{-- Importation css ici --}}
@push('extra-css')

@endpush

{{-- Contenu de la page ici --}}
@section('content')
@if ($errors->any())
   <div class="alert alert-danger">
     <ul>
     @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
     @endforeach
     </ul>
   </div>
@endif
@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>
        </button>
        <strong>Succès !</strong> {{ session('success') }}
    </div>
@endif
   
<div class="container">
  <div class="row">
    <div class="col-12">
      <section class="content" id="actu">
        <div class="heading-text heading-section">
          <span class="lead">Suivez l'actualité de la Commune et des environs</span>
        </div>
        <div id="blog" class="row">
          @foreach ($blogs as $item)
          <div class="col-12">
            <div class="card mb-3">
              @php
              if(sizeof($item->blog_images) > 0){
                $image = $item->blog_images[0];
                $image = $image->blog_image;
              }else{
                $image = "";
              }
              @endphp
              <img src="{{ asset('storage/uploads/images/blogs/'.$image) }}" class="card-img-top" alt="Image">
              <div class="card-body" style="width:100%;">
                <h5 class="card-title">{{ $item->titre }}</h5>
                <div class="text-container" id="textContainer">
                  <p class="card-text" >{{ $item->body}}</p>
                </div>
                <!--<a href="{{ route('blog_det',['id'=>$item->id]); }}" class="btn btn-primary">Lire Plus</a> <button id="readMoreBtn">Lire plus</button>-->
                
              </div>
              <div class="card-footer">
                <div class="justify-content-between">
                  <div>
                    <!--<button class="btn btn-secondary btn-sm"><i class="far fa-thumbs-up"></i> J'aime</button>
                    <button class="btn btn-secondary btn-sm"><i class="far fa-comment"></i> Commenter</button>
                    <button class="btn btn-secondary btn-sm"><i class="far fa-share-square"></i> Partager</button>-->
                  </div>
                  <div>
                    <button class="btn btn-link btn-sm" data-toggle="collapse" data-target="#commentCollapse{{ $item->id }}">Afficher les commentaires</button>
                  </div>
                </div>
                <div id="commentCollapse{{ $item->id }}" class="collapse">
                  <hr>
                  <!-- Section pour les commentaires -->
                  <!-- Insérez votre code ici pour afficher les commentaires de chaque publication -->
                </div>
            </div>
          </div>
          @endforeach
        </div>
      </section>
    </div>
  </div>
</div>


@endsection