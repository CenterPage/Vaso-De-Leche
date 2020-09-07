@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>
@endsection

@section('content')
	<div class="container">
		<h1 class="text-center ">Registrar Estableciento</h1>

		<div class="mt-5 row justify-content-center">
			<form action=""
				class="col-md-9 col-xs-12 card card-body"
			>
			@csrf
			
				<fieldset class="border p-4">
					<legend class="text-primary">
						Nombre, categoría e imagen
					</legend>

					<div class="form-group">
						<label for="name">Nombre Estableciento</label>
						<input name="name"
						    value="{{ old('name') }}"
						    class="form-control @error('name') is-invalid @enderror"
						    placeholder="Ejm. Hotel por el chikito" 
						>


                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<label for="category_id">Categoría</label>
						<select name="category_id"
								id="category_id"
								class="form-control @error('name') is-invalid @enderror">
							<option value="" selected disabled>
								Seleccione
							</option>

							@foreach ($categories as $category)
								<option value="{{ $category->id }}"
									{{ old('category_id') == $category->id ? 'selected' : '' }}>
									{{ $category->name }}
								</option>
								
							@endforeach
							
						</select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<label for="image">Imagen</label>
						<input name="image" type="file" 
						    value="{{ old('image') }}"
						    class="form-control @error('image') is-invalid @enderror"
						>


                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<label for="location">Ubicación</label>
						<input name="location"
							id="location" 
						    class="form-control"
						    placeholder="Av. Loreto número 12" 
						>
						<p class="text-center mb-3 text-secondary">El asistente colocará una  dirección estimada, mueve el pin hacía el lugar correcto</p>
					</div>

					<div class="form-group">
						<div id="mapa" style="height: 400px;"></div>
					</div>

				</fieldset>
				
			</form>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

  <script>
  	document.addEventListener('DOMContentLoaded', () => {
  		
	    const lat = 20.666332695977;
	    const lng = -103.392177745699;

	    const mapa = L.map('mapa').setView([lat, lng], 16);

	    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	    }).addTo(mapa);
	 
	    let marker;

	    // agregar el pin
	    marker = new L.marker([lat, lng]).addTo(mapa);
  	});
  </script>
@endsection