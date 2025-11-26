@extends('layouts.app')

@section('title', 'Home - MaoNaVaga')

@section('content')
    <div class="bg-gradient-to-r from-blue-500  to-blue-700 flex flex-col justify-center items-center px-2 py-12 md:px-0">
        <main>
            <h1 class="text-3xl font-bold text-center text-white md:mt-0">Conectando Empresas e Candidatos de Santa Rita do
                Sapucaí</h1>
            <p class="text-center text-xl mt-6 text-white">Encontre empregos e talentos na sua região com facilidade.</p>
            <div class="flex flex-col md:flex-row gap-6 justify-center mt-6">
                <a href="{{ route('register-company') }}"
                    class="bg-[#00A63E] hover:bg-blue-950 font-bold p-2 rounded-md text-white text-center">Cadastrar como
                    Empresa</a>
                <a href="{{ route('register-candidate') }}"
                    class="bg-[#155DFC] hover:bg-blue-950 text-white font-bold p-2 rounded-md text-center">Cadastrar como
                    Candidato</a>
            </div>
        </main>

        {{-- Vagas recentes  --}}
        <section>
            <h2 class="text-3xl text-white font-bold text-center mt-12">Vagas recentes</h2>
            <div class="flex flex-col md:flex-row gap-4 justify-center mt-6">
                @foreach ($vacancies->take(3) as $vacancy)
                    <x-card-job :id="$vacancy->id" :role="$vacancy->user->role" :title="$vacancy->title" :company="$vacancy->name" :city="$vacancy->address"
                        :date="$vacancy->created_at->format('d/m/Y')" />
                @endforeach
            </div>
        </section>

        <section class=" flex justify-center gap-6 mt-8">
            <p class="text-center text-gray-300">
                <ion-icon name="bag-outline" size="small"></ion-icon>
                <span class=" text-white font-bold">{{$vacancies->count()}}</span>
                vagas ativas
            </p>
            <p class="text-gray-300">
                <span class=" text-white font-bold">{{ $recruitCount }}</span>
                Recrutadores parceiros
            </p>
            <p class="text-gray-300">
                <span class=" text-white font-bold">{{ $candidateCount }}</span>
                Candidatos Cadastrados
            </p>
        </section>

        {{-- Passo a Passo  --}}
        <section class="py-8">
            <div class="max-w-6xl mx-auto px-4">
                <h2 class="text-3xl font-bold text-center text-white mb-12">Passo a Passo para se Candidatar</h2>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Passo 1 -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg flex flex-col items-center text-center">
                        {{-- <img src="https://via.placeholder.com/150" alt="Crie sua conta" class="mb-4 rounded-lg"> --}}
                        <h3 class="text-xl font-semibold mb-2">1º Crie sua conta</h3>
                        <p class="text-gray-600">Cadastre-se na nossa plataforma para começar a explorar oportunidades.</p>
                    </div>

                    <!-- Passo 2 -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg flex flex-col items-center text-center">
                        {{-- <img src="https://via.placeholder.com/150" alt="Envie seu CV" class="mb-4 rounded-lg"> --}}
                        <h3 class="text-xl font-semibold mb-2">2º Envie seu CV</h3>
                        <p class="text-gray-600">Cadastre seu currículo gratuitamente e apareça para as empresas.</p>
                    </div>

                    <!-- Passo 3 -->
                    <div class="bg-white p-6 rounded-2xl shadow-lg flex flex-col items-center text-center">
                        {{-- <img src="https://via.placeholder.com/150" alt="Candidate-se" class="mb-4 rounded-lg"> --}}
                        <h3 class="text-xl font-semibold mb-2">3º Candidate-se</h3>
                        <p class="text-gray-600">Escolha a vaga desejada e envie sua candidatura em poucos cliques.</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
