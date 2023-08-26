<!-- resources/views/contributions/index.blade.php -->
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
    
<section>
    <!-- Top Table UI -->

          <!-- Card image -->
          <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">


            <a href="" class="white-text mx-3">Liste des Cotisations</a>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('contributions.create') }}" title="Nouveau payement"> <i
                        class="fas fa-money ">+</i> </a>
            </div>

          </div>
          <!-- /Card image -->

          <div class="px-4">

            <div class="table-responsive">
              <!-- Table -->
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                <!-- Table head -->
                <thead>
                  <tr>
                    <th class="th-lg">Prenom Nom </th>
                    <th class="th-lg">Montant</th>
                    <th class="th-lg">Date</th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody>
                    @foreach ($users as $user)
                        @foreach ($user->contributions as $contribution)
                            <tr>
                                <td>{{ $user->prenom }} {{ $user->nom }}</td>
                                <td>{{ $contribution->amount }}</td>
                                <td>{{ $contribution->date }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table -->
            </div>

            <!-- Bottom Table UI -->

          </div>
</section>
    
@endsection


@push('extra-js')
    
    
    
    <script type="text/javascript">
  
    </script>
@endpush

