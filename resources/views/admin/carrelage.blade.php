@extends('layouts.app')

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
          <p style="font-size: 22px; font-weight: bold">Liste des carreaux</p>
        </div>
        <div id="blog" class="row">
          @foreach ($carrelages as $item)
          
          <div class="col-lg-3 col-md-6">
            <div class="card mb-3">
                @php
                  if(sizeof($item->blog_images) > 0){
                    $image = $item->blog_images[0];
                    $image = $image->blog_image;
                  }else{
                    $image ='';
                  }
                @endphp
                <img src="{{ asset('uploads/'.$image) }}" class="card-img-top  custom-img" alt="Image">
                <div class="card-body" style="width:100%;">
                    <h5 class="card-title">{{ $item->nom }}</h5>
                </div>
                <div class='row'>
                  <div class="col-md-6">
                    <h5 class="card-title">Prix: {{ $item->prix }}</h5>
                  </div>
                  <div class="col-md-6">
                    <p class="card-text">Quantité: {{ $item->qte }}</p>
                  </div>
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