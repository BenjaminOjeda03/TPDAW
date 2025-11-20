@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="card shadow-sm border-0">
        <div class="card-body">

            <h3 class="text-center mb-4 fw-bold">📊 Ventas Registradas</h3>

            {{-- Mostrar errores --}}
            @if(session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            {{-- Si no hay ventas --}}
            @if(empty($ventas))
                <div class="alert alert-warning text-center">
                    No hay ventas registradas.
                </div>
            @else

            {{-- Tabla de ventas --}}
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">Fecha</th>
                            <th class="text-center">CUIT</th>
                            <th class="text-center">Monto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventas as $v)
                            <tr>
                                <td class="text-center">{{ $v['fecha'] }}</td>
                                <td class="text-center">{{ $v['cuit'] }}</td>
                                <td class="text-center fw-bold text-success">
                                    ${{ number_format($v['monto'], 2, ',', '.') }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @endif

            {{-- Botón volver --}}
            <div class="text-center mt-4">
                <a href="{{ route('clientes.index') }}" class="btn btn-secondary px-4">
                    ⬅ Volver
                </a>
            </div>

        </div>
    </div>

</div>
@endsection