@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<h1 class="text-3xl font-bold mb-6">Dashboard</h1>

<p>Logged in as: {{ auth()->user()->nombre }} {{ auth()->user()->apellido }} ({{ auth()->user()->perfil }})</p>

<div class="mb-4">
    <a href="{{ route('clients.index') }}"
       class="btn btn-primary">
       📁 Client Management
    </a>
</div>

@if(auth()->user()->perfil === 'Administrador')
    <div class="mb-4">
        <a href="{{ route('users.index') }}"
           class="btn btn-success">
           👥 User Management
        </a>
    </div>
@else
    <p>No tienes el permiso de administrador</p>
@endif
@endsection