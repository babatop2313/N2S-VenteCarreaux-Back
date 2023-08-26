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
 @if (session('auth_error'))
    <div class="alert alert-danger">
        {{ session('auth_error') }}
    </div>
@endif

    
<section>
    <!-- Top Table UI -->

        <div class="card card-cascade narrower z-depth-1 mr-5">

          <!-- Card image -->
          <div class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">


            <a href="" class="white-text mx-3">Liste des membres</a>

          </div>
          <!-- /Card image -->

          <div class="px-4">

            <div class="table-responsive">
              <!-- Table -->
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">


                <!-- Table head -->
                <thead>
                  <tr>
                    <th>
                      <input class="form-check-input" type="checkbox" id="checkbox">
                      <label class="form-check-label" for="checkbox" class="mr-2 label-table"></label>
                    </th>
                    <th class="th-lg"><a>Prenom <i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a href="">Nom<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a href="">Departement<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a href="">Telephone<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a href="">Statu<i class="fas fa-sort ml-1"></i></a></th>
                    <th class="th-lg"><a href="">Actions<i class="fas fa-sort ml-1"></i></a></th>
                  </tr>
                </thead>
                <!-- Table head -->

                <!-- Table body -->
                <tbody>
                   @foreach ($users as $user)
                      <tr>
                        <th scope="row">
                          <div class="form-check">
                              <input class="form-check-input" name="case" value="{{ $user->id }}" type="checkbox" id="checkbox{{ $user->id }}">
                              <label class="form-check-label" for="checkbox{{ $user->id }}" class="label-table"></label>
                          </div>
                        </th>
                          <td>{{ $user->prenom }}</td>
                          <td>{{ $user->nom }}</td>
                          <td>{{ $user->dep->nom}}</td>
                          <td>{{ $user->telephone}}</td>
                          <td>
                               <div class="switch">
                                <input type="checkbox" id="userStatusSwitch" onchange="toggleStatus('{{ route('users.updateStatus', $user) }}')" {{ $user->status==1 ? 'checked' : '' }}>
                                <label for="userStatusSwitch"></label>
                              </div>
                          </td>
                          <td>
                              @if($user->affectation==NULL)
                              <a href="#" data-placement="top" title="Nommer" data-toggle="modal"
                                  data-target="#modalTransfertUser{{ $user->id }}">
                                  <i class="w-fa fas fa-user-shield"></i>
                              </a>
                              @else
                              <a href="#" data-placement="top" title="Denommer" data-toggle="modal"
                                  data-target="#modalRevoqueUser{{ $user->id }}">
                                  <i class="w-fa fas fa-times-circle"></i>
                              </a>
                              @endif

                              <!-- Modal: Tranferer Utilisateur -->
                              <div class="modal fade" id="modalTransfertUser{{ $user->id }}"
                                  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                  aria-hidden="true">
                                  <div class="modal-dialog cascading-modal" role="document">
                                      <!-- Content -->
                                      <div class="modal-content">

                                          <!-- Header -->
                                          <div class="modal-header light-blue darken-3 white-text">
                                              <h4 class="col">
                                                  Choisir {{ $user->prenom }} {{ $user->nom }}
                                              </h4>
                                              <button type="button" class="close waves-effect waves-light"
                                                  data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <!-- Body -->
                                          <form action="{{ route('users.superviser')  }}" method="POST">
                                              @csrf
                                              <input type="hidden" name="id" value="{{ $user->id }}">
                                              <input type="hidden" name="etat" value="nommer">
                                              <input type="hidden" name="dep_id" value="{{ $user->dep_id }}">
                                              <div class="modal-body mb-0">
                                                  <div class="md-form form-sm">
                                                    <h4 class="col">
                                                        Pour gérer l'arrondissement {{ $user->dep->nom }} !
                                                    </h4>

                                                      @error('depot')
                                                          <span class="text-danger">{{ $message }}</span>
                                                      @enderror

                                                  </div>

                                                  <div class="text-center mt-1-half">
                                                      <button type="submit"
                                                          class="btn btn-info mb-2">Choisir
                                                          <i class="fas fa-like ml-1"></i></button>
                                                  </div>

                                              </div>

                                          </form>
                                      </div>
                                      <!-- Content -->
                                  </div>
                              </div>
                              <!-- Modal: Tranferer Utilisateur -->
                              <!-- Modal: Tranferer Utilisateur -->
                              <div class="modal fade" id="modalRevoqueUser{{ $user->id }}"
                                  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                  aria-hidden="true">
                                  <div class="modal-dialog cascading-modal" role="document">
                                      <!-- Content -->
                                      <div class="modal-content">

                                          <!-- Header -->
                                          <div class="modal-header light-blue darken-3 white-text">
                                              <h4 class="col">
                                                  Dénommer {{ $user->prenom }} {{ $user->nom }}
                                              </h4>
                                              <button type="button" class="close waves-effect waves-light"
                                                  data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <!-- Body -->
                                          <form action="{{ route('users.superviser')  }}" method="POST">
                                              @csrf
                                              <input type="hidden" name="id" value="{{ $user->id }}">
                                              <input type="hidden" name="etat" value="denommer">
                                              <input type="hidden" name="dep_id" value="{{ $user->dep_id }}">
                                              <div class="modal-body mb-0">
                                                  <div class="md-form form-sm">
                                                    <h4 class="col">
                                                        Au niveau de l'arrondissement {{ $user->dep->nom }} !
                                                    </h4>

                                                      @error('depot')
                                                          <span class="text-danger">{{ $message }}</span>
                                                      @enderror

                                                  </div>

                                                  <div class="text-center mt-1-half">
                                                      <button type="submit"
                                                          class="btn btn-info mb-2">Dénommer
                                                          <i class="fas fa-like ml-1"></i></button>
                                                  </div>

                                              </div>

                                          </form>
                                      </div>
                                      <!-- Content -->
                                  </div>
                              </div>
                              <!-- Modal: Tranferer Utilisateur -->
                          </td>
                      </tr>
                    @endforeach
                </tbody>
                <!-- Table body -->
              </table>
              <!-- Table -->
            </div>

           
            

          </div>
        </div>
</section>
    
@endsection


@push('extra-js')
    
    
    
    <script type="text/javascript">
  
    </script>
@endpush