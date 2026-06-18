@extends('layouts.app')

@section('title', 'Editar Usuario - Mao Na Vaga')

@section('content')
    <form action="{{ route('admin.update', $user->id) }}" method="POST" class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    @csrf
    @method('POST')

    <div class="space-y-6">

        <!-- Plano -->
        <div>
            <label for="plan" class="block text-sm font-medium text-gray-700 mb-2">
                Plano
            </label>
            <input
                type="text"
                id="plan"
                name="plan"
                value="{{ old('plan', $user->plan) }}"
                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200"
            >
        </div>

        <!-- Limite de Vagas -->
        <div>
            <label for="vacancies_limit" class="block text-sm font-medium text-gray-700 mb-2">
                Limite de Vagas
            </label>
            <input
                type="number"
                id="vacancies_limit"
                name="vacancies_limit"
                min="0"
                value="{{ old('vacancies_limit', $user->vacancies_limit) }}"
                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200"
            >
        </div>

        <!-- Data de Expiração -->
        <div>
            <label for="expires_at" class="block text-sm font-medium text-gray-700 mb-2">
                Data de Expiração
            </label>
            <input
                type="date"
                id="expires_at"
                name="expires_at"
                value="{{ old('expires_at', optional($user->expires_at)->format('Y-m-d')) }}"
                class="w-full rounded-md border border-gray-300 px-3 py-2 focus:border-blue-500 focus:ring focus:ring-blue-200"
            >
        </div>

        <!-- Botões -->
        <div class="flex justify-end gap-3">

            <button
                type="submit"
                class="px-4 py-2 rounded-md bg-blue-600 text-white hover:bg-blue-700"
            >
                Salvar Alterações
            </button>
        </div>

    </div>
</form>
@endsection