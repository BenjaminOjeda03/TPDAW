@extends('layouts.app')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Ventas del Cliente</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(empty($ventas))
        <div class="alert alert-warning">No hay ventas registradas para este cliente.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>CUIT</th>
                    <th>Monto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ventas as $v)
                    <tr>
                        <td>{{ $v['fecha'] }}</td>
                        <td>{{ $v['cuit'] }}</td>
                        <td>${{ number_format($v['monto'], 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('clients.index') }}" class="btn btn-secondary mt-3">
        Volver
    </a>
</div>
@endsection