@extends('layouts.app')

@section('title','Perfil')

@section('content')
<h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
    Perfil
</h2>

<div class="space-y-6">

    <div class="p-4 bg-white shadow sm:rounded-lg">
        <livewire:profile.update-profile-information-form />
    </div>

    <div class="p-4 bg-white shadow sm:rounded-lg">
        <livewire:profile.update-password-form />
    </div>

    <div class="p-4 bg-white shadow sm:rounded-lg">
        <livewire:profile.delete-user-form />
    </div>

</div>
@endsection