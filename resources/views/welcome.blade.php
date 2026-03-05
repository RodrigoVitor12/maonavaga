@extends('layouts.app')

@section('title', 'Home - MaoNaVaga')

@section('content')

<!-- HERO -->
<div class="relative bg-gradient-to-br from-[#155DFC] via-blue-600 to-blue-800 text-white">

    <div class="max-w-6xl mx-auto px-6 py-20 text-center">

        <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6">
            Conectando Empresas e Talentos de <br class="hidden md:block">
            <span class="text-[#FDC700]">Santa Rita do Sapucaí</span>
        </h1>

        <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto mb-10">
            A plataforma que aproxima candidatos e empresas da sua região de forma simples e profissional.
        </p>

        <div class="flex flex-col md:flex-row gap-5 justify-center">

            <a href="{{ route('register-company') }}"
                class="bg-[#00A63E] hover:bg-green-700 px-8 py-3 rounded-xl font-semibold shadow-md hover:shadow-xl transition-all duration-200">
                Cadastrar como Empresa
            </a>

            <a href="{{ route('register-candidate') }}"
                class="bg-[#FDC700] text-[#0F172A] hover:bg-yellow-400 px-8 py-3 rounded-xl font-semibold shadow-md hover:shadow-xl transition-all duration-200">
                Cadastrar como Candidato
            </a>

        </div>

        <!-- Estatísticas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-16 text-center">

            <div>
                <p class="text-4xl font-bold text-[#FDC700]">
                    {{$vacancies->count()}}
                </p>
                <p class="text-blue-100">Vagas Ativas</p>
            </div>

            <div>
                <p class="text-4xl font-bold text-[#FDC700]">
                    {{ $recruitCount }}
                </p>
                <p class="text-blue-100">Recrutadores Parceiros</p>
            </div>

            <div>
                <p class="text-4xl font-bold text-[#FDC700]">
                    {{ $candidateCount }}
                </p>
                <p class="text-blue-100">Candidatos Cadastrados</p>
            </div>

        </div>

    </div>
</div>


<!-- VAGAS RECENTES -->
<section class="bg-[#F8FAFF] py-20">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-center text-[#0F172A] mb-12">
            Vagas Recentes
        </h2>

        <div class="grid md:grid-cols-3 gap-8 justify-center">
            @foreach ($vacancies->take(3) as $vacancy)
                <x-card-job 
                    :id="$vacancy->id" 
                    :role="$vacancy->user->role ?? null" 
                    :title="$vacancy->title" 
                    :company="$vacancy->name" 
                    :city="$vacancy->address"
                    :date="$vacancy->created_at->format('d/m/Y')" 
                />
            @endforeach
        </div>

    </div>
</section>


<!-- PASSO A PASSO -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-center text-[#0F172A] mb-16">
            Como Funciona
        </h2>

        <div class="grid md:grid-cols-3 gap-10">

            <div class="bg-[#F8FAFF] p-8 rounded-2xl shadow-sm hover:shadow-lg transition text-center">
                <div class="bg-[#155DFC]/10 w-14 h-14 flex items-center justify-center rounded-xl mx-auto mb-4">
                    <span class="text-[#155DFC] font-bold text-lg">1</span>
                </div>
                <h3 class="text-xl font-semibold mb-3">Crie sua Conta</h3>
                <p class="text-gray-600">
                    Cadastre-se gratuitamente na plataforma e comece sua jornada profissional.
                </p>
            </div>

            <div class="bg-[#F8FAFF] p-8 rounded-2xl shadow-sm hover:shadow-lg transition text-center">
                <div class="bg-[#155DFC]/10 w-14 h-14 flex items-center justify-center rounded-xl mx-auto mb-4">
                    <span class="text-[#155DFC] font-bold text-lg">2</span>
                </div>
                <h3 class="text-xl font-semibold mb-3">Cadastre seu Currículo</h3>
                <p class="text-gray-600">
                    Monte seu currículo e fique visível para empresas da região.
                </p>
            </div>

            <div class="bg-[#F8FAFF] p-8 rounded-2xl shadow-sm hover:shadow-lg transition text-center">
                <div class="bg-[#155DFC]/10 w-14 h-14 flex items-center justify-center rounded-xl mx-auto mb-4">
                    <span class="text-[#155DFC] font-bold text-lg">3</span>
                </div>
                <h3 class="text-xl font-semibold mb-3">Candidate-se</h3>
                <p class="text-gray-600">
                    Envie sua candidatura em poucos cliques e acompanhe seu processo.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- PARA EMPRESAS -->
<section class="py-20 bg-[#F8FAFF]">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-center text-[#0F172A] mb-16">
            Como Funciona para Empresas
        </h2>

        <div class="grid md:grid-cols-3 gap-10">

            <!-- Passo 1 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition text-center">
                <div class="bg-[#155DFC]/10 w-14 h-14 flex items-center justify-center rounded-xl mx-auto mb-4">
                    <span class="text-[#155DFC] font-bold text-lg">1</span>
                </div>
                <h3 class="text-xl font-semibold mb-3">Crie sua Conta</h3>
                <p class="text-gray-600">
                    Cadastre sua empresa gratuitamente na plataforma.
                </p>
            </div>

            <!-- Passo 2 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition text-center">
                <div class="bg-[#155DFC]/10 w-14 h-14 flex items-center justify-center rounded-xl mx-auto mb-4">
                    <span class="text-[#155DFC] font-bold text-lg">2</span>
                </div>
                <h3 class="text-xl font-semibold mb-3">Publique sua Vaga</h3>
                <p class="text-gray-600">
                    Crie sua vaga em poucos minutos e alcance candidatos da região.
                </p>
            </div>

            <!-- Passo 3 -->
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition text-center">
                <div class="bg-[#155DFC]/10 w-14 h-14 flex items-center justify-center rounded-xl mx-auto mb-4">
                    <span class="text-[#155DFC] font-bold text-lg">3</span>
                </div>
                <h3 class="text-xl font-semibold mb-3">Receba Candidaturas</h3>
                <p class="text-gray-600">
                    Analise currículos, agende entrevistas e contrate com facilidade.
                </p>
            </div>

        </div>

        <!-- CTA -->
        <div class="text-center mt-12">
            <a href="{{ route('register-company') }}"
                class="bg-[#155DFC] hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-semibold shadow-md hover:shadow-xl transition">
                Começar Agora
            </a>
        </div>

    </div>
</section>

{{-- Parceria --}}
<!-- EMPRESAS PARCEIRAS -->
{{-- <section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">

        <h2 class="text-3xl font-bold text-[#0F172A] mb-6">
            Empresas que Confiam na MaoNaVaga
        </h2>

        <p class="text-gray-600 mb-12 max-w-2xl mx-auto">
            Empresas de Santa Rita do Sapucaí já utilizam nossa plataforma para encontrar talentos locais.
        </p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-10 items-center">

            <!-- Logo exemplo -->
            <div class="flex justify-center">
                <img src="/images/empresa1.png" class="h-12 opacity-70 hover:opacity-100 transition">
            </div>

            <div class="flex justify-center">
                <img src="/images/empresa2.png" class="h-12 opacity-70 hover:opacity-100 transition">
            </div>

            <div class="flex justify-center">
                <img src="/images/empresa3.png" class="h-12 opacity-70 hover:opacity-100 transition">
            </div>

            <div class="flex justify-center">
                <img src="/images/empresa4.png" class="h-12 opacity-70 hover:opacity-100 transition">
            </div>

        </div>

    </div>
</section> --}}

@endsection