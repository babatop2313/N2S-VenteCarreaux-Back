
@extends('layouts.app')
@section('content')
		
			
				<!-- Content Header (Page header) -->
    <section class="content-header">					
		<div class="container-fluid my-2">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Create Category</h1>
				</div>
				<div class="col-sm-6 text-right">
                    <a href="{{route('types.index')}}" class="btn btn-primary">Retour</a>
				</div>
			</div>
			</div>
					<!-- /.container-fluid -->
	</section>
				<!-- Main content -->
	<section class="content">
					<!-- Default box -->
		<div class="container-fluid">
            <form action="{{ route('types.store') }}" method="POST" id="#typeForm" name="#typeForm">
                @csrf
			
				<div class="card">
					<div class="card-body">								
					   <div class="row">
						    <div class="col-md-6">
								<div class="mb-3">
									<label for="nomType">Nom</label>
									<input type="text" name="nomType" id="nomType" class="form-control @error('nomType') is-invalid @enderror" placeholder="Nom">	
								</div>

                                @error('nomType')
                                <p class="invalid-feedback">{{$message}}</p>
                                
                                @enderror
							</div>
                            <!--
							<div class="col-md-6">
                                <div class="md-3">
                                    <input type="hidden" id="image_id" name="image_id">
                                    <label for="image">Image</label>
                                    <div id="image" class="dropzone dz-clickable">
                                        <div class="dz-message needsclick">    
                                            <br>Déposez l'image ici ou cliquez pour téléverser.<br><br>                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            -->									
					</div>
				</div>							
			</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Creer</button>
							<a href="#" class="btn btn-outline-dark ml-3">Annuler</a>
						</div>

			</form>
		</div>
					<!-- /.card -->
	</section>
				<!-- /.content -->
			
@endsection


