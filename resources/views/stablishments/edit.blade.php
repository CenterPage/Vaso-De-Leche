@extends('layouts.app')

@section('styles')
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
  integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
  crossorigin=""/>

    <!-- Esri Leaflet Geocoder -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css"
    />

    <!-- Dropzone -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/dropzone.min.css" integrity="sha512-3g+prZHHfmnvE1HBLwUnVuunaPOob7dpksI7/v6UnF/rnKGwHf/GdEq9K7iEN7qTtW+S0iivTcGpeTBqqB04wA==" crossorigin="anonymous" />
@endsection

@section('content')
	<div class="container">
		<h1 class="text-center ">Editar Estableciento</h1>

		<div class="mt-5 row justify-content-center">
			<form action="{{ route('stablishments.update', $stablishment) }}"
                method="POST" enctype="multipart/form-data"
				class="col-md-9 col-xs-12 card card-body"
			>
			@csrf @method('PUT')
			
				<fieldset class="border p-4">
					<legend class="text-primary">
						Nombre, categoría e imagen
					</legend>

					<div class="form-group">
						<label for="name">Nombre Estableciento</label>
						<input name="name"
						    value="{{ old('name', $stablishment->name) }}"
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
									{{ old('category_id', $stablishment->category_id) == $category->id ? 'selected' : '' }}>
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

                        <img src="/storage/{{ $stablishment->image }}" alt="" style="width: 200px; margin-top: 15px;">
					</div>

					<div class="form-group">
						<label for="location">Ubicación</label>
						<input name="location"
							id="location"
						    class="form-control"
                            value="{{ old('location', $stablishment->location) }}" 
						    placeholder="Av. Loreto número 12" 
						>
						<p class="text-center mb-3 text-secondary">El asistente colocará una  dirección estimada, mueve el pin hacía el lugar correcto</p>
					</div>

					<div class="form-group">
						<div id="mapa" style="height: 400px;"></div>
					</div>

					<p>Confirma que los siguientes campos son los correctos</p>

					<div class="form-group">
						<label for="address">Dirección</label>
						<input type="text" id="address"
                            name="address" 
                            class="form-control @error('name') is-invalid @enderror"
						  placeholder="Av. Las Gardalias"
						  value="{{ old('address', $stablishment->address) }}">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<input type="hidden" id="latitud" name="latitud" value="{{ old('latitud', $stablishment->latitud) }}">
					<input type="hidden" id="longitud" name="longitud" value="{{ old('longitud', $stablishment->longitud) }}">

				</fieldset>

				<fieldset class="border p-4 mt-5">
                	<legend  class="text-primary">Imagenes Establecimiento: </legend>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input 
                            type="tel" 
                            class="form-control @error('phone')  is-invalid  @enderror" 
                            id="phone" 
                            placeholder="Teléfono Establecimiento"
                            name="phone"
                            value="{{ old('phone', $stablishment->phone) }}"
                        >

                            @error('phone')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea
                            class="form-control  @error('description')  is-invalid  @enderror" 
                            name="description"
                        >
                        	{{ old('description', $stablishment->description) }}
                        </textarea>

                            @error('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="open">Hora Apertura:</label>
                        <input 
                            type="time" 
                            class="form-control @error('open')  is-invalid  @enderror" 
                            id="open" 
                            name="open"
                            value="{{ old('open', $stablishment->open) }}"
                        >
                        @error('open')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="close">Hora Cierre:</label>
                        <input 
                            type="time" 
                            class="form-control @error('close')  is-invalid  @enderror" 
                            id="close" 
                            name="close"
                            value="{{ old('close', $stablishment->close) }}"
                        >
                        @error('close')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
            	</fieldset>

				<fieldset class="border p-4 mt-5">
                	<legend  class="text-primary">Información Establecimiento: </legend>
                    <div class="form-group">
                    	<label for="image">Imagenes</label>
                    	<div id="dropzone" class="dropzone form-control"></div>
                    </div>
                	</legend>

                	@if (count($images) > 0)
                		@foreach ($images as $image)
                			<input type="hidden" value="{{ $image->url }}" class="galery">
                		@endforeach
                	@endif

                </fieldset>

            	<input type="hidden" id="uuid" name="uuid" value="{{ $stablishment->uuid }}">

				<input type="submit" class="btn btn-primary mt-3 d-block" value="Guardar Cambios">
				
			</form>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
  crossorigin=""></script>

  	<!-- Load Esri Leaflet from CDN -->
	<script src="https://unpkg.com/esri-leaflet" defer></script>

    <!-- Esri Leaflet Geocoder -->
    <script src="https://unpkg.com/esri-leaflet-geocoder" defer></script>

    <!-- Dropzone -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.js" integrity="sha512-9WciDs0XP20sojTJ9E7mChDXy6pcO0qHpwbEJID1YVavz2H6QBz5eLoDD8lseZOb2yGT8xDNIV7HIe1ZbuiDWg==" crossorigin="anonymous" defer></script>

@endsection