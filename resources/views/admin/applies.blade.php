@extends('layouts.app')

@section('title', 'Entrevistas de emprego - Mao Na Vaga')

@section('content')
   <div class="p-2">
        <table class="w-full border-collapse text-left min-w-[700px]">
            <thead class="bg-[#1447E8] text-white">
                <tr>
                    <th class="p-3">Nome da empresa</th>
                    <th class="p-3">Vaga Candidatada</th>
                    <th class="p-3">Nome do Usuário</th>
                    <th class="p-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applies as $apply)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $apply->vacancy->name ?? '-' }}</td>
                        <td class="p-3 font-semibold text-gray-500">{{ $apply->vacancy->title ?? '-' }}</td>
                        <td class="p-3">{{ $apply->user->name ?? '-' }}</td>
                        <td class="p-3">{{ $apply->status ?? '—' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
                    {{ $applies->links() }}
                </div>
    </div>
@endsection