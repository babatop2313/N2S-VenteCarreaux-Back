@extends('layouts.app')

{{-- Importation css ici --}}
@push('extra-css')
<link href="{{ asset("gt/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css ") }}" rel="stylesheet">
<link href="{{ asset("gt/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css ") }}" rel="stylesheet">
<link href="{{ asset("gt/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css ") }}" rel="stylesheet">
<link href="{{ asset("gt/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css ") }}" rel="stylesheet">
<link href="{{ asset("gt/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css ") }}" rel="stylesheet">
@endpush

{{-- Contenu de la page ici --}}
@section('contenu_page')
    <section>
        <!-- Gird column -->
        <div class="col-md-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                     {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
       
          
            <div class="row">
                 <div class="col-12">
                       <a href="{{ route('users.create') }}" class="btn btn-success float-right">
                           Ajouter un utilisateur
                       </a>
                 </div>
            </div>
            <h5 class="my-4 dark-grey-text font-weight-bold">Liste des utilisateurs</h5>

            <div class="card">
                <div class="card-body">
               
                    {{-- Boutiques --}}
                    <div class="tab-content card">
                        <div class="tab-pane fade in show active"  role="tabpanel">
                            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"> 
                                <thead>
                                    <tr>
                                      
                                       
                                        <th class="th-sm">
                                            Prénom & Nom
                            
                                        </th>
                                        <th class="th-sm">
                                            Email
                                        </th>
                                        <th class="th-sm">
                                            Téléphone
                                        </th>
                                        <th class="th-sm">
                                            Profil
                                        </th>
                                        <th class="th-sm">
                                            Status
                                        </th>
                                        <th class="th-sm">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    @foreach ($users as $item)
                                   
                                        <tr>
                                         
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                          
                                            <td>{{ $item->telephone }}</td>
                                            <td>{{ $item->profil }}</td>
                                            <td class="text-primary">
                                                  @php
                                                       if($item->status == 1){
                                                        echo "<p style='color: green;font-weight: 900'>Activé";
                                                       }else{
                                                        echo "<p style='color: green;font-weight: 900''>Désactivé";
                                                       }
                                                  @endphp
                                            </td>
                                                       
                                            <td>
                                                <a href="{{ route('users.show', $item) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Voir" class="text-primary">
                                                    <i class="w-fa fas fa-eye"></i>
                                                </a>
                                                &nbsp;  &nbsp;  &nbsp;
                                                <a href="{{ route('users.edit',$item) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Modifier" class="text-success">
                                                    <i class="w-fa fas fa-edit"></i>
                                                </a>
                                                &nbsp;  &nbsp;  &nbsp;
                                                <a href="{{ route('users.delete',['id'=>$item->id]) }}" data-toggle="tooltip"
                                                    data-placement="top" title="Supprimer" class="text-danger">
                                                    <i class="w-fa fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- Gird column -->
    </section>
@endsection

{{-- Importation Js ici --}}
@push('extra-js')
    
<script src="{{ asset("gt/vendors/datatables.net/js/jquery.dataTables.min.js")}}"></script>
<script src="{{ asset("gt/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js")}}"></script>
<script src="{{ asset("gt/vendors/datatables.net-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{ asset("gt/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js")}}"></script>
<script src="{{ asset("gt/vendors/datatables.net-scroller/js/dataTables.scroller.min.js")}}"></script>

@endpush
