@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-around align-items-center m-4">
        <h4 class="mt-1"><a href="{{ route('stablishments.index') }}">Listado de Comites</a></h4>
        <<a class="btn btn-navbar bg-primary text-white" href="{{ route('stablishments.create') }}">Nuevo</a>
    </div>
    <div class="d-flex justify-content-center mb-3">
        <form action="{{ route('search.comite') }}" class="form-inline">
            @csrf
            <div class="input-group input-group-md">

                <input class="form-control form-control-navbar" name="search" type="search" placeholder="Buscar por comité" aria-label="Search" required>

                <div class="input-group-append">
                    <button class="btn btn-navbar bg-primary" type="submit">
                        @include('icons.icon-search')
                    </button>
                </div>
            </div>
        </form>
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
                <th scope="col">Fecha Emitido/Venc.</th>
                <th scope="col">Acciones</th>
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
                <td>{{ $stablishment->fecha_emitido }} / {{ $stablishment->fecha_vencimiento }}</td>
                <td>
                    <div class="d-flex">
                        <a href="{{ route('stablishments.edit', $stablishment) }}" data-toggle="tooltip" data-placement="top" title="Editar" class="text-warning mr-2">
                            @include('icons.icon-edit')
                        </a>

                        <form method="POST" action="{{ route('stablishments.destroy', $stablishment) }}"
                                style="display: inline;">
                                {{ csrf_field() }} {{ method_field('DELETE') }}
                            <button class="btn btn-xs btn-link p-0 m-0"
                              onclick="return confirm('¿Estás seguro de eliminarlo?')" data-toggle="tooltip" data-placement="top" title="Eliminar">

                              @include('icons.icon-delete')

                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
