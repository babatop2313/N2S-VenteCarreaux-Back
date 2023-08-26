@extends('layouts.app')

@section('contenu_page')
    <div class="row">
         <div class="col-12">
                 <div class="card">
                    <div class="card-header">
                           <h2>Info Utilisateur</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p><strong>Prénom & nom :</strong>  {{ $user->name }}</p>
                            </div>
                            <div class="col-12">
                                <p><strong>Téléphone : </strong> {{ $user->telephone }}</p>
                            </div>
                            <div class="col-12">
                                <p><strong>Email : </strong> {{ $user->telephone }}</p>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                @if ($user->status == 1)
                                     <a href="{{ route('lock',[$user->id,"false"]) }}"  class="btn btn-danger" >Désactiver le compte</a>
                                @else
                                     <a href="{{ route('lock',[$user->id,"true"]) }}"  class="btn btn-success" >Activer le compte</a>

                                @endif
                                
                            </div>
                            <div class="col-6">
                                <a href="{{ route('reset',['id'=>$user->id]) }}"  class="btn btn-success float-right"  >Reset mot de passe</a>
                            </div>
                        </div>
                    </div>
                 </div>
         </div>
    </div>
@endsection
