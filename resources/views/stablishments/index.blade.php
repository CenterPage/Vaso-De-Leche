@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-around align-items-center m-4">
        <h4>Listado de Comites</h4>
        <a class="btn btn-primary" href="{{ route('stablishments.create') }}">Nuevo</a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre Comite</th>
                <th scope="col">Dirección</th>
                <th scope="col">Mz/Lote</th>
                <th scope="col">Lugar</th>
                <th scope="col">Rural/Urbano</th>
                <th scope="col">Presidenta</th>
                <th scope="col">Beneficiados</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Número Resolución</th>
                <th scope="col">Fecha Emitido/Venc.</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($stablishments as $stablishment)
            <tr>
                <td>{{ $stablishment->name }}</td>
                <td>{{ $stablishment->address }}</td>
                <td>{{ $stablishment->mz_lote }}</td>
                <td>{{ $stablishment->category->name }}</td>

                @if ($stablishment->tipo_sector == 1)
                    <td>RURAL</td>
                @else
                    <td>URBANO</td>
                @endif
                <td>{{ $stablishment->name_presidenta }}</td>
                <td>{{ $stablishment->num_beneficiado }}</td>
                <td>{{ $stablishment->phone }}</td>
                <td>{{ $stablishment->num_resolucion }}</td>
                <td>{{ $stablishment->fecha_emitido }} / {{ $stablishment->fecha_vencimiento }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
