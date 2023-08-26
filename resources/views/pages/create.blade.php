@extends('layouts.api')
<section class="bg-light pb-5 subBanner" style="background-color: #f6f4f5!important;">

    <div class="container mb-5">
      <div class="row">
        <div class="col-12 text-center mb-7">
          <h1 class="incription">
              <strong class="">
                    <br>
              </strong>
          </h2>
        </div>
      </div>
      <div class="row ">
          <div class="col-12">
              <div class="card" style="max-width: 100%;">
                  <div class="card-body">
                       @if (Session::has('success'))
                       <div class="alert alert-success" role="alert">
                           {{ Session::get('success') }}
                       </div>

                       @endif

                      <form action="{{route('inscriptions.store')}}" method="POST">
                        @csrf
                          <div class="row register-form">
                              <h5 class="col-12  text-center">Informations Personnelles</h5>
                              <div class="form-group col-6">
                                  <label  class=" col-form-label">Prenom <span class="text-danger">*</span> </label>
                                  <input type="text" name="user[prenom]"class="form-control @error('prenom') is-invalid @enderror" placeholder="nom..." required>
                                  @error('prenom')
                                  <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                              </div>

                              <div class="form-group col-6">
                                <label class=" col-form-label">Nom <span class="text-danger">*</span></label>
                               <input type="text" name="user[nom]"  class="form-control  @error('nom') is-invalid @enderror"placeholder="prenom..." required>
                               @error('nom')
                               <div class="invalid-feedback">{{ $message }}</div>
                               @enderror
                              </div>

                              <div class="form-group col-6">
                                  <label for="adresse" class="col-form-label">Adresse  </label>
                                  <input type="text" name="info_user[adresse]"  class="form-control" placeholder="adresse..." required>
                                     </div>

                              <div class="form-group col-6">
                                <label for="adresse" class="col-form-label">Telephone <span class="text-danger">*</span> </label>
                                <input type="number" name="user[telephone]"  class="form-control @error('telephone') is-invalid @enderror" placeholder="telephone..." required>
                                        @error('telephone')
                                     <div class="invalid-feedback">{{ $message }}</div>
                                       @enderror
                            </div>

                              <div class="form-group col-6">
                                  <label for="password" class=" col-form-label">Email <span class="text-danger">*</span></label>
                                  <input type="email" name="user[email]"class="form-control @error('email') is-invalid @enderror"placeholder="email..." required>
                                        @error('email')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                              </div>
<!--
                              <div class="form-group col-6">
                                <label for="password" class=" col-form-label">Niveau détudes <span class="text-danger">*</span></label>
                                <input type="text" name="user[niveau]"class="form-control @error('niveau') is-invalid @enderror"placeholder="Niveau...">
                                      @error('niveau')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                              </div>
-->
                              <div class="form-group  col-6">
                                <label for="niveau" class=" col-form-label">Niveau détudes <span class="text-danger">*</span></label>
                                <Select class="form-control" name="niveau" aria-label="selectionner votre niveau" style="opacity:15 !important;" required>
                                    <option value="" selected="selected">Selectionner...</option>
                                    <option value="BAC">BAC</option>
                                    <option value="BTS">BTS</option>
                                    <option value="BTP">BTP</option>
                                    <option value="LICENCE">LICENCE</option>
                                    <option value="SMASTERport">MASTER</option>
                                    <option value="DOCTORAT">DOCTORAT</option>
                                </Select>
                              </div>

                              <div class="form-group  col-6">
                                <label for="region" class=" col-form-label">Région<span class="text-danger">*</span></label>
                                <Select class="form-control" name="region" aria-label="selectionner une région" style="opacity:15 !important;">
                                    <option value="1" selected="selected">Fatick</option>
                                </Select>
                              </div>

                              <div class="form-group  col-6">
                                <label for="dep" class=" col-form-label">Arondissement<span class="text-danger">*</span></label>
                                <Select class="form-control" name="dep" aria-label="selectionner votre arrondissementt" style="opacity:15 !important;" required>
                                    <option value="" selected="selected">Selectionner...</option>
                                     @foreach ($deps as $item)
                                        <option value="{{ $item->id }}">{{ $item->nom }}</option>
                                    @endforeach
                                </Select>
                              </div>


                              <div class="form-group col-6">
                                  <label for="password" class=" col-form-label">Université <span class="text-danger">*</span></label>
                                  <input type="text" name="user[universite]"class="form-control @error('universite') is-invalid @enderror"placeholder="universite..." required>
                                        @error('universite')
                                          <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                              </div>

                              <div class="form-group col-3">
                                <label for="password" class=" col-form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" name="user[password]"class="form-control @error('password') is-invalid @enderror"placeholder="password..." required>
                                      @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                              </div>
                              <div class="form-group col-3">
                                <label for="password" class=" col-form-label">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" name="user[cpassword]"class="form-control @error('password') is-invalid @enderror"placeholder="password..." required>
                                      @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                      @enderror
                              </div>

                            
                          </div>
                            <hr style="border:2px solid #cfcccc;">
                            <input type="checkbox" id="optionnel" name="optionnel" onchange="toggleOptionnel()"><strong></strong> Êtes-vous dans une entreprise si oui cocher la case<br>
                            <div id="section-optionnelle" style="display:none;">
                                <h5 class="text-center">Informations de l'Entreprise</h5>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <label>Entreprise <span class="text-danger">*</span></label>
                                    <input type="text" name="info_entreprise[entreprise]" class="form-control @error('entreprise') is-invalid @enderror" placeholder="nom de votre entreprise">
                                    @error('entreprise')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                    </div>
                                    <div class="col-sm-6">
                                    <label>Adresse: </label>
                                    <input type="text" name="info_entreprise[adresse]"  class="form-control"placeholder="adresse...">
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-6">
                                    <label>Telephone : </label>
                                    <input type="number" name="info_entreprise[telephone]" class="form-control"placeholder="telephone...">
                                    </div>
                                    <div class="col-sm-6">
                                    <label>Logo: </label>
                                    <input type="file" name="info_entreprise[logo]"  class="form-control">
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-12">
                                    <label>Secteur d'activite <span class="text-danger">*</span> </label>
                                    <input type="text" name="info_entreprise[secteur]" class="form-control @error('secteur') is-invalid @enderror"placeholder="secteur d'activite">
                                    @error('secteur')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                  @enderror
                                    </div>
                                    </div>

                                    </div><br>
                                    <button type="submit" class="text-white bold" >Enregistre</button>
                                    </form>

                                    </div>

                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </section>
