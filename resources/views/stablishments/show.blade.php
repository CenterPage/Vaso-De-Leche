@extends('layouts.app')

@section('content')
    <div class="container my-5">
        {{-- <h2 class="text-center">Comité {{ $stablishment->name }}</h2> --}}
        <div class="row align-items-start">
            <div class="col-md-2"></div>
            <div class="col-md-4 order-2">
                {{-- <img class="mb-4" src="../storage/{{ $stablishment->image }}" alt="" style="width: 400px;"> --}}

                <h2 >INFORMACIÓN</h2>
                <span><strong class="text-secondary">Comité:</strong> {{ $stablishment->name }}</span><br>
                <span><strong class="text-secondary">Presidenta:</strong> {{ $stablishment->name_presidenta }}</span><br>
                <span><strong class="text-secondary">Beneficiados:</strong> {{ $stablishment->num_beneficiado }}</span><br>
                <span><strong class="text-secondary">N. Resolución:</strong> {{ $stablishment->num_resolucion }}</span><br>
                <span><strong class="text-secondary">Fecha Emitido:</strong> {{ $stablishment->fecha_emitido }}</span><br>
                <span><strong class="text-secondary">Fecha Vencimiento:</strong> {{ $stablishment->fecha_vencimiento }}</span>

                <p class="mt-5">{{ $stablishment->description }}</p>

                {{-- <photo-stablishment-show :stablishmentPhoto="{{ $stablishment }}"></photo-stablishment-show> --}}

            </div>
            <aside class="col-md-4 order-1">
                <div class="">
                    <mapa-location-show :stablishment="{{ $stablishment }}"></mapa-location-show>
                </div>
                <div class="text-center text-white mt-2 mb-4 bg-primary p-2">
                    <h4 class="text-white">MÁS INFORMACIÓN</h4>
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
