@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-10">

    {{-- Título --}}
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Painel Administrativo</h1>
        <span class="text-gray-500">Bem-vindo, {{ auth()->user()->name }}</span>
    </div>
    
    <div class="flex flex-col gap-6">
        <a href="{{route('admin.candidates')}}" class="bg-blue-500 p-2 rounded-md text-white font-bold text-2xl hover:bg-blue-700">Candidatos</a>
        <a href="{{route('admin.companies')}}" class="bg-blue-500 p-2 rounded-md text-white font-bold text-2xl hover:bg-blue-700">Empresas</a>
        <a href="{{route('admin.vacancies')}}" class="bg-blue-500 p-2 rounded-md text-white font-bold text-2xl hover:bg-blue-700">Vagas</a>
        <a href="{{route('admin.applies')}}" class="bg-blue-500 p-2 rounded-md text-white font-bold text-2xl hover:bg-blue-700">Candidaturas</a>
    </div>

</div>
@endsection
