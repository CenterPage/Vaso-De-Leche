@extends('layouts.app')

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
						Nombre y categoría
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
				</fieldset>
				
			</form>
		</div>
	</div>
@endsection