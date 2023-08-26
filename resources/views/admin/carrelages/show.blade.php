@extends('layouts.app')


@section('content')
<div class="row">

    <div class="col-12">
        <h1>{{ $carrelage->nom }}</h1>
     </div>
     <div class="col-8">
          
               {!! $carrelage->description !!}
           
     </div>
     <div class="col-12">
        
                     
         <img src="{{ asset('uploads/'.$carrelage->blog_images[0]->blog_image) }}" alt="image"  style="width:400px;">
       
     </div>
     <div class='row'>
                  <div class="col-md-6">
                    <h5 class="card-title">Prix: {{ $carrelage->prix }}</h5>
                  </div>
                  <div class="col-md-6">
                    <p class="card-text">Quantité: {{ $carrelage->qte }}</p>
                  </div>
                </div>
</div>

@endsection