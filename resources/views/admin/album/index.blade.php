@extends('layouts.app')


{{-- Importation css ici --}}
@push('extra-css')
<link href="{{ asset("gt/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css ") }}" rel="stylesheet">
<link href="{{ asset("gt/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css ") }}" rel="stylesheet">
<link href="{{ asset("gt/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css ") }}" rel="stylesheet">
<link href="{{ asset("gt/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css ") }}" rel="stylesheet">
<link href="{{ asset("gt/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css ") }}" rel="stylesheet">
@endpush


@section('contenu_page')
<div class="row">

    <div class="col-lg-9 col-md-9 col-12">
        
        
    </div>

    <div class="col-lg-3 col-md-3 col-12">
        <a class="btn btn-success float-right" href="{{ route('album.create') }}">Ajouter un personnel</a>
    </div>

</div>
<div class="row">
  
    <div class="col-12">
       
        {{-- <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%"> --}}
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 
            <thead>
                <tr>
                   
                    <td>Photo</td>
                    <td>Nom</td>
                    <td>Telephone</td>
                    <td>Fonction</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($albums as $item)
                <tr>
                    
                     <td>
                        <img src="{{ asset('albums/'.$item->photo)}}" class="rounded-circle" style="width: 50px;"
                        alt="{{ $item->nom }}">
                     </td>
                     <td>{{ $item->nom }}</td>
                     <td>
                        {{ $item->telephone }}
                        
                      </td>
                     <td> {{ $item->fonction }}</td>

                     <td>
                        
                        &nbsp;   &nbsp;
                        <a href="{{ route('album.delete',['id'=>$item->id]); }}">
                            <i class="fa fa-trash" style="color: rgb(238, 10, 18);"></i>
                        </a>
                     </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
{{-- Importation Js ici --}}
@push('extra-js')
    
<script src="{{ asset("gt/vendors/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{ asset("gt/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script src="{{ asset("gt/vendors/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{ asset("gt/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js")}}"></script>
<script src="{{ asset("gt/vendors/datatables.net-scroller/js/dataTables.scroller.min.js")}}"></script>


    <script type="text/javascript">

        var tab = [];

      
       
      
        
            function changeStatus(ev){
                var confirm = window.confirm("Voulez-vous vraiment changer l'état");
                if(confirm){
                    var tab = [];
                $('input[name="case"]').each(function () {
                    if (this.checked) {
                        tab.push(parseInt($(this).val())); 
                    }
                });
                if(tab.length > 0){
                    $.ajax({
                        type: "POST",
                        url: '/change_status',
                        data: { infos: tab,status: ev ,_token: '{{csrf_token()}}' },
                        success: function (data) {
                            if(data){
                                var loc = window.location;
                                window.location = loc.protocol+"//"+loc.hostname+"/blog";
                            }
                        },
                        error: function (data, textStatus, errorThrown) {
                            console.log(data);
                          

                        },
                    });
                }else{
                    alert('Merci de selectionner un article !');
                }
              
                }
               
            }
         

       
        

        function change_etat() {
            confirm("Voulez-vous vraiment changer l'état de l'utilisateur");
        }

    </script>
@endpush