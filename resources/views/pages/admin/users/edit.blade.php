@extends('layouts.app')

@section('contenu_page')
    <div class="row">
         <div class="col-12">
              <div class="container">
                <form  method="POST" action="{{ route('users.update',['user'=>$user]) }}" >
                    @csrf
                    <input type="hidden" name="_method" value="PUT" >
 
                    <div class="form-group">
                        <label for="">Sexe</label>
                        <select name="sexe" id="" class="form-control" required>
                             <option value="Homme" selected >Homme</option>
                             <option value="Femme">Femme</option>
                        </select>
                    </div>
 
                    <div class="form-group">
                     <label for="name">Prénom & Nom</label>
                      <input type="text" value="{{ $user->name }}" class="form-control @if($errors->has('name')) has-error @endif" name="name" required>
                      @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                   </div>
                   <div class="form-group">
                     <label for="telephone">Téléphone</label>
                      <input type="tel" value="{{ $user->telephone }}" class="form-control @if($errors->has('telephone')) has-error @endif" name="telephone" required>
                      @error('telephone')
                       <div class="alert alert-danger">{{ $message }}</div>
                     @enderror
                    </div>
                   <div class="form-group">
                     <label for="email">Email</label>
                      <input type="email" value="{{ $user->email }}" class="form-control @if($errors->has('email')) has-error @endif" name="email" required>
                      @error('email')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                   </div>
                   <div class="form-group">
                     <label for="profil">Profil</label>
                       <select name="profil" id=""  class="form-control @if($errors->has('profil')) has-error @endif">
                           <option value="">Séléctionner un profil</option>
                           <option value="admin">Administrateur</option>
                           <option value="personnel">Personnel</option>
                       </select>
                     
                      @error('profil')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
 
                   <div class="form-group">
                        <input type="submit" value="Modifier" class="btn btn-success" />
                   </div>
              </form>
              </div>
         </div>
    </div>
@endsection
