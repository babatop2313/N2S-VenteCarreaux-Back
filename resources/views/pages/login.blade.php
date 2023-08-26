@extends('layouts.api')
<div class="vh-100 d-flex justify-content-center align-items-center">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-8 col-lg-12">
          <div class="content_critere"></div>
          <div class="card bg-white shadow-lg">
            <div class="card-body p-5">
                @if (session('auth_error'))
                <div class="alert alert-danger">
                    {{ session('auth_error') }}
                </div>
            @endif

                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

              <div class="row d-flex justify-content-center">
                <div class="col-md-6">
                  <form action="{{ url('connexion') }}" class="mb-3 mt-md-4" method="POST">
                     @csrf

                    <p class=" mb-2">S'il vous plait entrer votre mot d'utilisateur and mot de passe!</p>
                    <div class="mb-3">
                      <label for="email" class="form-label ">Address Email <span class="text-danger" style="font-size: 22px">*</span></label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                      <label for="password" class="form-label ">Mot de passe <span class="text-danger"style="font-size: 22px;">*</span></label>
                      <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" placeholder="*******">
                    </div>
                    <div class="d-grid">
                      <button class="text-white bold" type="submit">Login</button>
                    </div>
                  </form>
                </div>
                <div class="col-md-6" style="background-color:grey;">
                    <h1 class="text-center">CARRELAGE</h1>
                    <img src="{{ asset('assets/images/carrelage.jpg')}}" alt="" class="img-fluid ml-40">
                </div>
              </div>
              


            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
