@extends('layouts.app')

@section('content')
<main class="flex-1 p-10 bg-[#F5F6F8] min-h-screen">

    <div class="text-center mb-12">
        <h1 class="text-4xl font-bold text-[#0D6EFD]">Escolha seu Plano</h1>
        <p class="text-gray-600 mt-2">Selecione o plano que melhor se encaixa nas necessidades da sua empresa.</p>
    </div>

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

    <div class="mt-16 text-center text-gray-500">
        <p>Todos os planos incluem suporte básico, gerenciamento de vagas e candidatos.</p>
    </div>

</main>
@endsection