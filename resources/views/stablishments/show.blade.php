@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h2 class="text-center">Comite {{ $stablishment->name }}</h2>
        <div class="row align-items-start">
            <div class="col-md-8 order-2">
                <img src="../storage/{{ $stablishment->image }}" alt="" style="width: 400px;">

                <p>Hola! <br>   Mi nombre es <span class="font-weight-bold text-secondary">{{ $stablishment->name_presidenta }}</span> y soy la presidenta del comite vaso de leche <span class="font-weight-bold text-secondary">{{ $stablishment->name }}</span>. Junto a la Municipalidad Distrital de Castilla y mi equipo podemos llegar a  <span class="font-weight-bold text-secondary">{{ $stablishment->num_beneficiado }} beneficiados</span>
                </p>

                <p class="mt-5">{{ $stablishment->description }}</p>

                {{-- <photo-stablishment-show :stablishmentPhoto="{{ $stablishment }}"></photo-stablishment-show> --}}

            </div>
            <aside class="col-md-4 order-1">
                <div class="">
                    <mapa-location-show :stablishment="{{ $stablishment }}"></mapa-location-show>
                </div>
                <div class="text-center text-white mt-2 mb-4 bg-primary p-2">
                    <h4 class="text-white">Más información</h4>
                    <p class="text-white m-0">
                        <span class="font-weight-bold">Lugar:</span>
                        {{ $stablishment->category->name }}
                    </p>
                    <p class="text-white m-0">
                        <span class="font-weight-bold">Ubicación:</span>
                        {{ $stablishment->address }}
                    </p>
                    <p class="text-white m-0">
                        <span class="font-weight-bold">Mz / Lote:</span>
                        {{ $stablishment->mz_lote }}
                    </p>
                    <p class="text-white mb-1">
                        <span class="font-weight-bold">Teléfono:</span>
                        {{ $stablishment->phone }}
                    </p>
                </div>

            </aside>
        </div>
    </div>
@endsection
