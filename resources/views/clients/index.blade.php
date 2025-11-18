@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Listado de Clientes</h1>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Acciones</th>
        </tr>
        </thead>

        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nombre }}</td>
                <td>{{ $cliente->dni }}</td>
                <td>
                    <a href="{{ route('clientes.ventas', $cliente->id) }}" 
                       class="btn btn-primary">
                        Ver ventas
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
@endsection