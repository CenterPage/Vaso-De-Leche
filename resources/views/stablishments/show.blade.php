@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h2 class="text-center">{{ $stablishment->name }}</h2>
        <div class="row align-items-start">
            <div class="col-md-8 order-2">
                <img src="../storage/{{ $stablishment->image }}" alt="" style="width: 400px;">

                <p class="mt-5">{{ $stablishment->description }}</p>

                {{-- <photo-stablishment-show :stablishmentPhoto="{{ $stablishment }}"></photo-stablishment-show> --}}

            </div>
            <aside class="col-md-4 order-1">
                <div class="">
                    <mapa-location-show :stablishment="{{ $stablishment }}"></mapa-location-show>
                </div>
                <div class="text-center text-white mt-2 mb-4 bg-primary">
                    <h2>Más información</h2>
                    <p class="text-white mt-1">
                        <span class="font-weight-bold">Ubicación</span>
                        {{ $stablishment->address }}
                    </p>
                    <p class="text-white mt-1">
                        <span class="font-weight-bold">Horario</span>
                        {{ $stablishment->open }} - {{ $stablishment->close }}
                    </p>
                    <p class="text-white mt-1">
                        <span class="font-weight-bold">Telefono</span>
                        {{ $stablishment->phone }}
                    </p>
                </div>

            </aside>
        </div>
    </div>
@endsection
