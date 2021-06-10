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
		<h1 class="text-center ">Registrar Comite</h1>

		<div class="mt-5 row justify-content-center">
			<form action="{{ route('stablishments.store') }}"
                method="POST" enctype="multipart/form-data"
				class="col-md-9 col-xs-12 card card-body"
			>
			@csrf

				<fieldset class="border p-4">
					<legend class="text-primary">
						Nombre comite, sector e imagen
					</legend>

					<div class="form-group">
						<label for="name">Nombre Comite</label>
						<input name="name"
						    value="{{ old('name') }}"
						    class="form-control @error('name') is-invalid @enderror"
						    placeholder="Ejm. Cocos Blancos"
						>


                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="form-group">
						<label for="category_id">Lugar</label>
						<select class="form-control selectpicker"
                                name="category_id"
								id="category_id"
                                data-live-search="true"
                        >
							<option selected disabled>
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

					<div class="form-group d-none">
						<label for="location">Ubicación</label>
						<input name="location"
							id="location"
						    class="form-control"
                            value="{{ old('location') }}"
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
						  placeholder="Ejm. .M'Vitro-Peluquería, Calle José de San Martín, Castilla, Piura, 20003, PER"
						  value="{{ old('address') }}">

                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

                    <div class="form-group">
                        <label for="mz_lote">Mz / Lote</label>
                        <input type="text" id="mz_lote"
                            name="mz_lote"
                            class="form-control @error('name') is-invalid @enderror"
                          placeholder="Ejm. MZ Q LT 14"
                          value="{{ old('mz_lote') }}">

                        @error('mz_lote')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

					<input type="hidden" id="latitud" name="latitud" value="{{ old('latitud') }}">
					<input type="hidden" id="longitud" name="longitud" value="{{ old('longitud') }}">

				</fieldset>

				<fieldset class="border p-4 mt-5">
                	<legend  class="text-primary">Información Comite: </legend>
                    <div class="form-group">
                        <label for="name_presidenta">Nombre Presidenta</label>
                        <input class="form-control @error('name_presidenta') is-invalid  @enderror"
                            type="text"
                            id="name_presidenta"
                            placeholder="Ejm. Julia Zapata"
                            name="name_presidenta"
                            value="{{ old('name_presidenta') }}"
                        >

                            @error('name_presidenta')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input name="cargo"
                            value="{{ old('cargo') }}"
                            class="form-control @error('cargo') is-invalid @enderror"
                            placeholder="Ejm. Presidenta"
                        >

                        @error('cargo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="num_beneficiado">N. Beneficiados</label>
                        <input class="form-control @error('num_beneficiado') is-invalid  @enderror"
                            type="text"
                            id="num_beneficiado"
                            placeholder="Ejm. 60"
                            name="num_beneficiado"
                            value="{{ old('num_beneficiado') }}"
                        >

                            @error('num_beneficiado')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="num_resolucion">N. Resolución</label>
                        <input class="form-control @error('num_resolucion') is-invalid  @enderror"
                            type="text"
                            id="num_resolucion"
                            placeholder="Ejm. 0255"
                            name="num_resolucion"
                            value="{{ old('num_resolucion') }}"
                        >

                            @error('num_resolucion')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="fecha_emitido">Fecha Emitido</label>
                        <input class="form-control @error('fecha_emitido') is-invalid  @enderror"
                            type="date"
                            min="2018-01-01" max="2030-12-31" required
                            id="fecha_emitido"
                            name="fecha_emitido"
                            value="<?php echo date("Y-m-d"); ?>"
                        >

                            @error('fecha_emitido')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="fecha_vencimiento">Fecha Vencimiento</label>
                        <input class="form-control @error('fecha_vencimiento') is-invalid  @enderror"
                            type="date"
                            min="2018-01-01" max="2030-12-31" required
                            id="fecha_vencimiento"
                            name="fecha_vencimiento"
                            value="<?php echo date("Y-m-d"); ?>"
                        >

                            @error('fecha_vencimiento')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="tipo_sector">Tipo Sector</label>

                        <select class="form-control" name="tipo_sector">
                            <option value="1" {{ old('tipo_sector') }}>RURAL</option>
                            <option value="2" {{ old('tipo_sector') }}>URBANO</option>
                        </select>

                        @error('tipo_sector')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input class="form-control @error('phone') is-invalid  @enderror"
                            type="tel"
                            id="phone"
                            placeholder="Ejm. 980751866"
                            name="phone"
                            value="{{ old('phone') }}"
                        >

                            @error('phone')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea
                            class="form-control  @error('descripcion')  is-invalid  @enderror"
                            name="description"
                        >{{ old('descripcion') }}</textarea>

                            @error('descripcion')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                    </div>

            	</fieldset>

				<fieldset class="border p-4 mt-5">
                	<legend  class="text-primary">Imagenes Comite: </legend>
                    <div class="form-group">
                    	<label for="image">Imagenes</label>
                    	<div id="dropzone" class="dropzone form-control"></div>
                    </div>
                	</legend>
                </fieldset>

            	<input type="hidden" id="uuid" name="uuid" value="{{ Str::uuid()->toString() }}">
                {{-- <input type="hidden" name="user_id"
                    value="1"> --}}
				<input type="submit" class="btn btn-primary mt-3 d-block" value="Registrar">

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
