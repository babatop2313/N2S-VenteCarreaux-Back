@extends('layouts.app')


@section('contenu_page')
<div class="row">

    <div class="col-12">
        <h1>{{ $blog->titre }}</h1>
     </div>
     <div class="col-8">
          
               {!! $blog->body !!}
           
     </div>
     <div class="col-4">
        
                     
         <img src="/uploads/{{ $blog->blog_images[0]->blog_image }}" alt=""  style="width:400px;">
       
     </div>
</div>

@endsection