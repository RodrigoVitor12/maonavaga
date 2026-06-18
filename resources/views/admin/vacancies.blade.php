@extends('layouts.app')

@section('title', 'Vagas de emprego - Mao Na Vaga')

@section('content')
   <div class="bg-white p-6 rounded-2xl shadow overflow-x-auto">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Vagas Publicadas</h2>
        <table class="w-full border-collapse text-left min-w-[700px]">
            <thead class="bg-[#1447E8] text-white">
                <tr>
                    <th class="p-3">Nº</th>
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
                        <td class="p-3 font-semibold text-gray-900">{{ $vacancies->firstItem() + $loop->index }}</td>
                        <td class="p-3 font-semibold text-gray-500">{{ $vacancy->id }}</td>
                        <td class="p-3">{{ $vacancy->title }}</td>
                        <td class="p-3">{{ $vacancy->user->name ?? '—' }}</td>
                        <td class="p-3">{{ $vacancy->salary ?? 'A combinar' }}</td>
                        <td class="p-3">{{ $vacancy->created_at->format('d/m/Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
                    {{ $vacancies->links() }}
                </div>
    </div>
@endsection