@extends('pages.demande.layouts.app_blog')



@section('content')
    
    <br>
    <div class="container">
        <div class="row">
            <div class="col-12">
               <h1>{{ $blog->titre }}</h1>
            </div>
            <div class="col-8">
                  
                      {!! $blog->body !!}
                  
            </div>
            <div class="col-4">
               
                            
                <img src="/uploads/images/blogs/{{ $blog->blog_images[0]->blog_image }}" alt=""  style="width:400px;">
              
            </div>
            
       </div>
       <div class="row">
             <div class="col-12">
                <section class="content" id="actu">
                    
                      <div class="heading-text heading-section">
                        <p style="font-size: 22px;font-weight: bold">Autres</p>
                        <span class="lead">Suivez l'actualité de la Commune et des environs </span>
                      </div>
                      <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
                        <!-- Post item-->
                        
                        @foreach ($blogs as $item)
                        <div class="post-item border">
                          <div class="post-item-wrap">
                            <div class="post-image">
                              @php
                              if(sizeof($item->blog_images) > 0){
                              $image = $item->blog_images[0];
                              $image = $image->blog_image;
                              }else{
                              $image = "";
                              }
                  
                              @endphp
                  
                              <a href="#">
                  
                                <img src="/uploads/{{$image}}" alt="">
                              </a>
                              <span class="post-meta-category"><a href="">{{ $item->categorie }}</a></span>
                            </div>
                            <div class="post-item-description">
                              <span class="post-meta-date"><i class="fa fa-calendar-o"></i></span>
                              <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>0
                                  Comments</a></span>
                              <h2><a href="#">{{ $item->titre }}
                                </a></h2>
                              <p> {{ Str::of(strip_tags($item->body))->limit(100) }}</p>
                              <a href="{{ route('blog_detaille',['id'=>$item->id]); }}" class="item-link">Lire Plus <i class="icon-chevron-right"></i></a>
                            </div>
                          </div>
                        </div>
                        @endforeach
                        <!-- end Post item-->
                  
                      </div>
                   
                  </section>
             </div>
       </div>
    </div>


@endsection