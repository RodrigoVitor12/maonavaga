@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 space-y-10">

    {{-- Título --}}
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Painel Administrativo</h1>
        <span class="text-gray-500">Bem-vindo, {{ auth()->user()->name }}</span>
    </div>

    {{-- Usuários --}}
    <div class="bg-white p-6 rounded-2xl shadow overflow-x-auto">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Usuários Cadastrados</h2>
        <table class="w-full border-collapse text-left min-w-[700px]">
            <thead class="bg-[#1447E8] text-white">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Nome</th>
                    <th class="p-3">E-mail</th>
                    <th class="p-3">Tipo</th>
                    <th class="p-3">Currículo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3 font-semibold text-gray-700">{{ $user->id }}</td>
                        <td class="p-3">{{ $user->name }}</td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3">
                            @if ($user->role == 2)
                                <span class="text-red-600 font-semibold">Empresa</span>
                            @elseif ($user->role == 1)
                                <span class="text-blue-600 font-semibold">Candidato</span>
                            @else
                                <span class="text-green-600 font-semibold">Admin</span>
                            @endif
                        </td>
                        <td class="p-3"> 
                            @if ($user->resume)
                                <a href="{{ route('show.resume', ['id' => $user->id]) }}"
                                class="inline-block px-3 py-1 bg-[#1447E8] text-white text-sm rounded-md hover:bg-blue-900 transition">
                                    Ver Currículo
                                </a>
                            @else
                                <p>Sem Curriculo</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
                    {{ $users->links() }}
                </div>
    </div>

    {{-- Vagas --}}
    <div class="bg-white p-6 rounded-2xl shadow overflow-x-auto">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Vagas Publicadas</h2>
        <table class="w-full border-collapse text-left min-w-[700px]">
            <thead class="bg-[#1447E8] text-white">
                <tr>
                    <th class="p-3">ID</th>
                    <th class="p-3">Título</th>
                    <th class="p-3">Empresa</th>
                    <th class="p-3">Salário</th>
                    <th class="p-3">Data</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacancies as $vacancy)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3 font-semibold text-gray-700">{{ $vacancy->id }}</td>
                        <td class="p-3">{{ $vacancy->title }}</td>
                        <td class="p-3">{{ $vacancy->user->name ?? '—' }}</td>
                        <td class="p-3">{{ $vacancy->salary ?? 'A combinar' }}</td>
                        <td class="p-3">{{ $vacancy->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
