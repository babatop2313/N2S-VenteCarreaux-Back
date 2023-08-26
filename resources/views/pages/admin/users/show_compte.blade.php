@extends(session('the_user')[0]->profil === 'admin' ? 'layouts.app' : 'layouts.apis')

@section('content')
    <div class="row">
         <div class="col-12">
                 <div class="card">
                    <div class="card-header">
                           <h2>Mes  infos compte</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p><strong>Prénom & nom :</strong>  {{ $user->prenom }} {{ $user->nom }}</p>
                            </div>
                            <div class="col-12">
                                <p><strong>Téléphone : </strong> {{ $user->telephone }}</p>
                            </div>
                            <div class="col-12">
                                <p><strong>Email : </strong> {{ $user->email }}</p>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                             
                                
                            </div>
                            @if(session('the_user')[0]->profil === 'admin')
                            <div class="col-6">
                                <a href="{{ route('update_password') }}"  class="btn btn-success float-right"  id="changePassword" >changer mon  mot de passe</a>
                            </div>
                            @endif
                            @if(session('the_user')[0]->profil === 'membre')
                            <div class="col-6">
                                <a href="{{ route('update_passwords') }}"  class="btn btn-success float-right"  id="changePassword" >changer mon  mot de passe</a>
                            </div>
                            @endif
                            
                        </div>
                    </div>
                 </div>
         </div>
    </div>
@endsection
@push('extra-js')

    <script type="text/javascript">
         $('#changePassword').click(()=>{
              var confirm = window.confirm('Etes vous sure de vouloire changer le mot de passe');

              if(confirm){
                        var recup = prompt("Nouveau mot de passe", "Mot de passe");
                        if(recup != null){
                              

                                $.ajax({
                                    type: "GET",
                                    url:"{{ route('changePassword') }}",
                                    data: { password: recup },
                                    success: function (data) {
                                        if(data){
                                            var loc = window.location;
                                            window.location = loc.protocol+"//"+loc.hostname+"/users";
                                        }
                                    },
                                    error: function (data, textStatus, errorThrown) {
                                        console.log(data);
                                    

                                    },
                            });
                        }else{

                            alert('merci de saisir un mot de passe')
                        }
                       
              }
         });


    </script>
    
@endpush