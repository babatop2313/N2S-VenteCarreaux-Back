@extends('layouts.app')


{{-- Importation css ici --}}
@push('extra-css')
@endpush


@section('content')
<div class="row">

    <div class="col-lg-9 col-md-9 col-12">
        
        
    </div>

    <div class="col-lg-3 col-md-3 col-12">
        <a class="btn btn-success float-right" href="{{ route('create_carrelage') }}">Ajouter un article</a>
    </div>

</div>
<div class="row">
    <div class="col-12">
        <button class="btn btn-success" onclick="return changeStatus('p')">
            Publier
        </button>
        <button class="btn btn-warning"  onclick="return changeStatus('d')">
            Désactiver
        </button>
        <button class="btn btn-danger"  onclick="return changeStatus('s')">
            Supprimer
        </button>
    </div>
    <div class="col-12">
       
        {{-- <table id="dtMaterialDesignExample" class="table table-striped" cellspacing="0" width="100%"> --}}
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 
            <thead>
                <tr>
                    <td>#</td>
                    <td>Nom</td>
                    <td>Description</td>
                    <td>Quantité</td>
                    <td>Prix</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($carrelages as $item)
                <tr>
                     <td>
                        <div class="form-check">
                            <input class="form-check-input" name="case" value="{{ $item->id }}" type="checkbox" id="checkbox{{ $item->id }}">
                            <label class="form-check-label" for="checkbox{{ $item->id }}" class="label-table"></label>
                        </div>
                     </td>
                     <td>{{ $item->nom }}</td>
                     <td>
                        {!! Str::limit(strip_tags($item->description),30) !!}
                        {{-- @php
                             echo  Str::of($item->description) ;
                        @endphp --}}
                        
                      </td>
                     <td>{{ $item->qte }}</td>
                     <td>{{ $item->prix }}</td>
                     <td>
                          @php
                              if($item->status == "p"){
                                    echo "<p class='text-success'><strong>Publié</strong></p>";
                              }
                             
                              if($item->status == "d"){
                                   echo "<p class='text-warning'><strong>Désactivé</strong></p>";
                              }
                              
                          @endphp
                     </td>
                     <td>
                        <a href="{{ route('show_carrelage',['id'=>$item->id]); }}">
                        <i class="fa fa-eye" style="color: green;"></i>
                        </a>
                        &nbsp;   &nbsp;
                        <a href="{{ route('edit_carrelage',['id'=>$item->id]); }}">
                            <i class="fa fa-edit" style="color: rgb(238, 10, 18);"></i>
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
    

@endpush