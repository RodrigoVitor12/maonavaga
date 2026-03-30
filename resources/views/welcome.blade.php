@extends('layouts.app')

@section('title', 'MaoNaVaga - Empregos no Sul de Minas')

@section('content')

<!-- HERO -->
<div class="relative bg-gradient-to-br from-[#155DFC] via-blue-600 to-blue-800 text-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-6 py-24 md:py-28 text-center">

        <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
            Conectando Empresas e Talentos de <br class="hidden md:block">
            <span class="text-[#FDC700]">todo o Sul de Minas</span>
        </h1>

        <p class="text-xl md:text-2xl text-blue-100 max-w-3xl mx-auto mb-10">
            A plataforma que aproxima candidatos e empresas da sua região de forma simples e profissional.
        </p>

        <div class="flex flex-col md:flex-row gap-5 justify-center items-center">
            <a href="{{ route('register-company') }}"
                class="bg-[#00A63E] hover:bg-green-700 px-10 py-4 rounded-2xl font-semibold text-lg shadow-lg hover:shadow-xl transition-all duration-300 flex items-center gap-3">
                Cadastrar Empresa (Grátis para começar)
            </a>

            <a href="{{ route('register-candidate') }}"
                class="bg-[#FDC700] text-[#0F172A] hover:bg-yellow-400 px-10 py-4 rounded-2xl font-semibold text-lg shadow-lg hover:shadow-xl transition-all duration-300">
                Cadastrar como Candidato
            </a>
        </div>

        <!-- Estatísticas -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mt-20 text-center">
            <div>
                <p class="text-5xl font-bold text-[#FDC700]">
                    {{$vacancies->count()}}
                </p>
                <p class="text-blue-100 text-lg mt-2">Vagas Ativas</p>
            </div>
            <div>
                <p class="text-5xl font-bold text-[#FDC700]">
                    {{ $recruitCount }}
                </p>
                <p class="text-blue-100 text-lg mt-2">Recrutadores Parceiros</p>
            </div>
            <div>
                <p class="text-5xl font-bold text-[#FDC700]">
                    {{ $candidateCount }}
                </p>
                <p class="text-blue-100 text-lg mt-2">Candidatos Cadastrados</p>
            </div>
        </div>

    </div>
</div>

<!-- VANTAGENS DA PLATAFORMA -->
<section class="py-20 bg-white border-b">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-3xl md:text-4xl font-bold text-center text-[#0F172A] mb-16">
            Por que usar o Mão na Vaga?
        </h2>

        <div class="grid md:grid-cols-4 gap-10 text-center">

            <!-- vantagem 1 -->
            <div class="group">
                <div class="bg-[#155DFC]/10 w-16 h-16 flex items-center justify-center rounded-2xl mx-auto mb-6 group-hover:scale-110 transition">
                    <span class="text-3xl">📍</span>
                </div>

                <h3 class="text-xl font-semibold mb-3">
                    Foco Regional
                </h3>

                <p class="text-gray-600 text-sm leading-relaxed">
                    Conectamos empresas e candidatos de todo o Sul de Minas, 
                    aumentando as chances de encontrar talentos locais.
                </p>
            </div>


            <!-- vantagem 2 -->
            <div class="group">
                <div class="bg-[#155DFC]/10 w-16 h-16 flex items-center justify-center rounded-2xl mx-auto mb-6 group-hover:scale-110 transition">
                    <span class="text-3xl">⚡</span>
                </div>

                <h3 class="text-xl font-semibold mb-3">
                    Contratação Mais Rápida
                </h3>

                <p class="text-gray-600 text-sm leading-relaxed">
                    Publique sua vaga em minutos e comece a receber candidatos rapidamente.
                </p>
            </div>


            <!-- vantagem 3 -->
            <div class="group">
                <div class="bg-[#155DFC]/10 w-16 h-16 flex items-center justify-center rounded-2xl mx-auto mb-6 group-hover:scale-110 transition">
                    <span class="text-3xl">💰</span>
                </div>

                <h3 class="text-xl font-semibold mb-3">
                    Muito Mais Acessível
                </h3>

                <p class="text-gray-600 text-sm leading-relaxed">
                    Planos acessíveis pensados para empresas locais,
                    muito mais baratos que grandes plataformas.
                </p>
            </div>


            <!-- vantagem 4 -->
            <div class="group">
                <div class="bg-[#155DFC]/10 w-16 h-16 flex items-center justify-center rounded-2xl mx-auto mb-6 group-hover:scale-110 transition">
                    <span class="text-3xl">🎯</span>
                </div>

                <h3 class="text-xl font-semibold mb-3">
                    Candidatos Qualificados
                </h3>

                <p class="text-gray-600 text-sm leading-relaxed">
                    Receba currículos organizados e acompanhe
                    cada candidatura diretamente na plataforma.
                </p>
            </div>

        </div>

    </div>
</section>

<!-- VAGAS RECENTES -->
<section class="bg-[#F8FAFF] py-20">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-[#0F172A] mb-12">
            Vagas Recentes no Sul de Minas
        </h2>

        <div class="grid md:grid-cols-3 gap-8">
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

        <div class="text-center mt-10">
            <a href="{{ route('vacancies.show') }}" 
               class="text-[#155DFC] hover:text-blue-700 font-semibold flex items-center justify-center gap-2">
                Ver todas as vagas →
            </a>
        </div>
    </div>
</section>

<!-- COMO FUNCIONA PARA CANDIDATOS -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center text-[#0F172A] mb-16">
            Como Funciona para Candidatos
        </h2>

        <div class="grid md:grid-cols-3 gap-10">
            <div class="bg-[#F8FAFF] p-8 rounded-3xl shadow-sm hover:shadow-xl transition text-center">
                <div class="bg-[#155DFC]/10 w-16 h-16 flex items-center justify-center rounded-2xl mx-auto mb-6">
                    <span class="text-[#155DFC] font-bold text-2xl">1</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Crie sua Conta</h3>
                <p class="text-gray-600">Cadastre-se gratuitamente e tenha acesso a vagas da sua região.</p>
            </div>

            <div class="bg-[#F8FAFF] p-8 rounded-3xl shadow-sm hover:shadow-xl transition text-center">
                <div class="bg-[#155DFC]/10 w-16 h-16 flex items-center justify-center rounded-2xl mx-auto mb-6">
                    <span class="text-[#155DFC] font-bold text-2xl">2</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Cadastre seu Currículo</h3>
                <p class="text-gray-600">Fique visível para empresas de Santa Rita, Pouso Alegre, Itajubá e toda a região.</p>
            </div>

            <div class="bg-[#F8FAFF] p-8 rounded-3xl shadow-sm hover:shadow-xl transition text-center">
                <div class="bg-[#155DFC]/10 w-16 h-16 flex items-center justify-center rounded-2xl mx-auto mb-6">
                    <span class="text-[#155DFC] font-bold text-2xl">3</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Candidate-se</h3>
                <p class="text-gray-600">Envie candidaturas em poucos cliques e acompanhe o processo.</p>
            </div>
        </div>

        <div class="text-center mt-14">
            <a href="{{ route('register-candidate') }}"
                class="bg-[#155DFC] hover:bg-blue-700 text-white px-10 py-4 rounded-2xl font-semibold text-lg shadow-md hover:shadow-xl transition inline-block">
                Cadastrar meu Currículo Agora
            </a>
        </div>
    </div>
</section>

<!-- PARA EMPRESAS (com planos resumidos) -->
<section class="py-20 bg-[#F8FAFF]">
    <div class="max-w-6xl mx-auto px-6">

        <h2 class="text-3xl font-bold text-center text-[#0F172A] mb-16">
            Como Funciona para Empresas
        </h2>

        <div class="grid md:grid-cols-3 gap-10 mb-20">
            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition text-center">
                <div class="bg-[#155DFC]/10 w-16 h-16 flex items-center justify-center rounded-2xl mx-auto mb-6">
                    <span class="text-[#155DFC] font-bold text-2xl">1</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Crie sua Conta</h3>
                <p class="text-gray-600">Cadastre sua empresa gratuitamente e teste a plataforma.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition text-center">
                <div class="bg-[#155DFC]/10 w-16 h-16 flex items-center justify-center rounded-2xl mx-auto mb-6">
                    <span class="text-[#155DFC] font-bold text-2xl">2</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Publique sua Vaga</h3>
                <p class="text-gray-600">Alcance candidatos qualificados do Vale da Eletrônica e Sul de Minas.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm hover:shadow-xl transition text-center">
                <div class="bg-[#155DFC]/10 w-16 h-16 flex items-center justify-center rounded-2xl mx-auto mb-6">
                    <span class="text-[#155DFC] font-bold text-2xl">3</span>
                </div>
                <h3 class="text-2xl font-semibold mb-4">Receba Candidaturas</h3>
                <p class="text-gray-600">Analise currículos, agende entrevistas e contrate mais rápido.</p>
            </div>
        </div>

        <!-- Planos Resumidos -->
        <!-- PLANOS -->
        <div class="max-w-6xl mx-auto mt-16 grid md:grid-cols-4 gap-8">

            <!-- Plano Gratuito -->
            <div class="bg-white rounded-3xl shadow-sm p-8 border hover:shadow-xl transition">
                <h4 class="text-xl font-bold mb-2">Starter</h4>
                <p class="text-gray-500 mb-6">Para testar a plataforma</p>

                <p class="text-4xl font-bold text-green-600 mb-6">
                    R$0
                    <span class="text-sm text-gray-500 font-normal">/mês</span>
                </p>

                <ul class="space-y-3 text-gray-600 mb-8">
                    <li>✔ 1 vaga ativa</li>
                    <li>✔ Receber currículos</li>
                    <li>✔ Perfil da empresa</li>
                    <li>✔ Até 2 Agendamento de entrevistas</li>
                    <li class="text-gray-400">✖ Banco de currículos</li>
                    <li class="text-gray-400">✖ Destaque de vagas</li>
                </ul>

                <a href="{{ route('register-company') }}"
                    class="block text-center bg-gray-200 hover:bg-gray-300 py-3 rounded-xl font-semibold transition">
                    Começar grátis
                </a>
            </div>


            <!-- Plano Básico -->
            <div class="bg-white rounded-3xl shadow-sm p-8 border hover:shadow-xl transition">
                <h4 class="text-xl font-bold mb-2">Local</h4>
                <p class="text-gray-500 mb-6">Para pequenas empresas</p>

                <p class="text-4xl font-bold text-[#155DFC] mb-6">
                    R$49
                    <span class="text-sm text-gray-500 font-normal">/mês</span>
                </p>

                <ul class="space-y-3 text-gray-600 mb-8">
                    <li>✔ Até 5 vagas ativas</li>
                    <li>✔ Receber candidatos</li>
                    <li>✔ Perfil da empresa</li>
                    <li>✔ Acesso ao banco de currículos</li>
                    <li>✔ Agendamento de entrevistas Ilimitado</li>
                    <li class="text-gray-400">✖ Destaque de vagas</li>
                </ul>

                <a href="{{ route('register-company') }}"
                    class="block text-center bg-[#155DFC] text-white hover:bg-blue-700 py-3 rounded-xl font-semibold transition">
                    Assinar plano
                </a>
            </div>


            <!-- Plano Profissional (Recomendado) -->
            <div class="bg-white rounded-3xl shadow-xl p-8 border-2 border-[#155DFC] relative">

                <span class="absolute -top-3 left-1/2 -translate-x-1/2 bg-[#155DFC] text-white text-sm px-4 py-1 rounded-full">
                    Mais popular
                </span>

                <h4 class="text-xl font-bold mb-2">Profissional</h4>
                <p class="text-gray-500 mb-6">Para empresas que contratam sempre</p>

                <p class="text-4xl font-bold text-[#155DFC] mb-6">
                    R$99
                    <span class="text-sm text-gray-500 font-normal">/mês</span>
                </p>

                <ul class="space-y-3 text-gray-600 mb-8">
                    <li>✔ Vagas ilimitadas</li>
                    <li>✔ Banco de currículos completo</li>
                    <li>✔ Destaque nas vagas</li>
                    <li>✔ Filtros de candidatos</li>
                    <li>✔ Suporte prioritário</li>
                </ul>

                <a href="{{ route('register-company') }}"
                    class="block text-center bg-[#00A63E] text-white hover:bg-green-700 py-3 rounded-xl font-semibold transition">
                    Assinar plano
                </a>
            </div>


            <!-- Plano Premium -->
            <div class="bg-white rounded-3xl shadow-sm p-8 border hover:shadow-xl transition">
                <h4 class="text-xl font-bold mb-2">Premium</h4>
                <p class="text-gray-500 mb-6">Máxima visibilidade</p>

                <p class="text-4xl font-bold text-[#155DFC] mb-6">
                    R$149
                    <span class="text-sm text-gray-500 font-normal">/mês</span>
                </p>

                <ul class="space-y-3 text-gray-600 mb-8">
                    <li>✔ Vagas ilimitadas</li>
                    <li>✔ Vagas no topo da plataforma</li>
                    <li>✔ Destaque no Instagram</li>
                    <li>✔ Banco completo de candidatos</li>
                    <li>✔ Relatórios de candidatos</li>
                </ul>

                <a href="{{ route('register-company') }}"
                    class="block text-center bg-[#FDC700] hover:bg-yellow-400 py-3 rounded-xl font-semibold transition">
                    Assinar plano
                </a>
            </div>

        </div>
        <p class="text-center text-gray-500 mt-10">
            Sem contrato. Cancele quando quiser.
            </p>

        <!-- CTA final da seção -->
        <div class="text-center mt-16">
            <a href="{{ route('register-company') }}"
                class="bg-[#155DFC] hover:bg-blue-700 text-white px-10 py-4 rounded-2xl font-semibold text-lg shadow-md hover:shadow-xl transition">
                Publicar minha primeira vaga grátis
            </a>
        </div>

    </div>
</section>

<!-- EMPRESAS PARCEIRAS (descomente quando tiver logos reais) -->
{{-- 
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-bold text-[#0F172A] mb-6">
            Empresas que já confiam na MaoNaVaga
        </h2>
        <p class="text-gray-600 mb-12 max-w-2xl mx-auto">
            Empresas de Santa Rita do Sapucaí e Sul de Minas já utilizam nossa plataforma.
        </p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-12 items-center opacity-75 hover:opacity-100 transition">
            <!-- Substitua pelos logos reais -->
            <img src="/images/parceiros/empresa1.png" alt="Empresa 1" class="h-12 mx-auto">
            <img src="/images/parceiros/empresa2.png" alt="Empresa 2" class="h-12 mx-auto">
            <img src="/images/parceiros/empresa3.png" alt="Empresa 3" class="h-12 mx-auto">
            <img src="/images/parceiros/empresa4.png" alt="Empresa 4" class="h-12 mx-auto">
        </div>
    </div>
</section>
--}}

@endsection