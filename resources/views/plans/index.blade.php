@extends('layouts.app')

@section('content')
<section class="min-h-screen bg-gray-50 py-24">
    <div class="max-w-7xl mx-auto px-6">

        <!-- Header -->
        <div class="text-center mb-16">
            <h1 class="text-5xl font-bold text-gray-900 mb-5">
                Planos para Empresas
            </h1>

            <p class="text-gray-600 text-lg max-w-2xl mx-auto leading-relaxed">
                Escolha o plano ideal para divulgar vagas, encontrar candidatos
                e contratar profissionais do Sul de Minas com mais rapidez.
            </p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 max-w-5xl mx-auto">

            <!-- Starter -->
            <div
                class="bg-white border border-gray-200 rounded-3xl p-10 shadow-sm hover:shadow-xl transition-all duration-300">

                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">
                        Starter
                    </h2>

                    <p class="text-gray-500 mt-2 text-lg">
                        Para começar gratuitamente
                    </p>
                </div>

                <!-- Preço -->
                <div class="flex items-end gap-2 mb-10">
                    <span class="text-6xl font-bold text-green-600">
                        R$0
                    </span>

                    <span class="text-gray-500 text-lg mb-2">
                        /mês
                    </span>
                </div>

                <!-- Lista -->
                <ul class="space-y-5 text-gray-700">

                    <li class="flex items-center gap-3">
                        <span class="text-purple-600 text-xl">✔</span>
                        1 vaga ativa
                    </li>

                    <li class="flex items-center gap-3">
                        <span class="text-purple-600 text-xl">✔</span>
                        Receber candidaturas
                    </li>

                    <li class="flex items-center gap-3">
                        <span class="text-purple-600 text-xl">✔</span>
                        Visualizar currículos
                    </li>

                    <li class="flex items-center gap-3">
                        <span class="text-purple-600 text-xl">✔</span>
                        10 dias de acesso
                    </li>

                    <li class="flex items-center gap-3 text-gray-400">
                        <span class="text-gray-400 text-xl">✖</span>
                        Agendamento de entrevistas
                    </li>

                </ul>

                <!-- Botão -->
                <button
                    class="w-full mt-12 bg-gray-100 hover:bg-gray-200 text-gray-900 font-semibold py-4 rounded-2xl transition-all duration-300">
                    Começar grátis
                </button>

            </div>

            <!-- Profissional -->
            <div
                class="relative bg-white border-2 border-blue-600 rounded-3xl p-10 shadow-xl">

                <!-- Badge -->
                <div
                    class="absolute -top-4 left-1/2 -translate-x-1/2 bg-blue-600 text-white text-sm font-semibold px-5 py-2 rounded-full shadow-md">
                    Mais Popular
                </div>

                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900">
                        Profissional
                    </h2>

                    <p class="text-gray-500 mt-2 text-lg">
                        Para empresas que contratam com frequência
                    </p>
                </div>

                <!-- Preço -->
                <div class="flex items-end gap-2 mb-10">
                    <span class="text-6xl font-bold text-blue-600">
                        R$49
                    </span>

                    <span class="text-gray-500 text-lg mb-2">
                        /mês
                    </span>
                </div>

                <!-- Lista -->
                <ul class="space-y-5 text-gray-700">

                    <li class="flex items-center gap-3">
                        <span class="text-purple-600 text-xl">✔</span>
                        Vagas ilimitadas
                    </li>

                    <li class="flex items-center gap-3">
                        <span class="text-purple-600 text-xl">✔</span>
                        Currículos ilimitados
                    </li>

                    <li class="flex items-center gap-3">
                        <span class="text-purple-600 text-xl">✔</span>
                        Agendamento de entrevistas
                    </li>

                    <li class="flex items-center gap-3">
                        <span class="text-purple-600 text-xl">✔</span>
                        WhatsApp direto com candidatos
                    </li>

                    <li class="flex items-center gap-3">
                        <span class="text-purple-600 text-xl">✔</span>
                        Suporte prioritário
                    </li>
                    <li class="flex items-center gap-3">
                        <span class="text-purple-600 text-xl">✔</span>
                        30 dias de acesso
                    </li>

                </ul>

                <!-- Botão -->
                <a href="https://wa.me/5535997401598?text=Ol%C3%A1%2C%20tudo%20bem%3F%20Gostaria%20de%20assinar%20meu%20plano%2C%20como%20fa%C3%A7o%3F"
                    target="_blank"
                    class="block w-full mt-12 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-4 rounded-2xl transition-all duration-300 shadow-lg hover:shadow-xl text-center">
                        Assinar plano
                </a>

            </div>

        </div>

        {{-- <!-- Extras -->
        <div class="mt-20 max-w-4xl mx-auto">

            <div class="bg-white border border-gray-200 rounded-3xl p-8 shadow-sm">

                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">
                    Destaques Extras
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                    <div class="border border-gray-200 rounded-2xl p-6 text-center">
                        <div class="text-4xl mb-3">🚀</div>

                        <h4 class="font-semibold text-lg text-gray-900 mb-2">
                            Vaga em Destaque
                        </h4>

                        <p class="text-gray-500 text-sm mb-4">
                            Sua vaga aparece primeiro na plataforma.
                        </p>

                        <span class="text-blue-600 font-bold text-xl">
                            R$15,00
                        </span>
                    </div>

                    <div class="border border-gray-200 rounded-2xl p-6 text-center">
                        <div class="text-4xl mb-3">📸</div>

                        <h4 class="font-semibold text-lg text-gray-900 mb-2">
                            Divulgação no Instagram
                        </h4>

                        <p class="text-gray-500 text-sm mb-4">
                            Publicação da vaga nas redes do Mão na Vaga.
                        </p>

                        <span class="text-blue-600 font-bold text-xl">
                            R$24,90
                        </span>
                    </div>

                    <div class="border border-gray-200 rounded-2xl p-6 text-center">
                        <div class="text-4xl mb-3">📌</div>

                        <h4 class="font-semibold text-lg text-gray-900 mb-2">
                            Destaque na Home
                        </h4>

                        <p class="text-gray-500 text-sm mb-4">
                            Mais visibilidade para sua empresa e vagas.
                        </p>

                        <span class="text-blue-600 font-bold text-xl">
                            R$39,90
                        </span>
                    </div>

                </div>

            </div>

        </div> --}}

        <!-- Footer -->
        <div class="text-center mt-14 text-gray-500">
            Sem contrato. Cancele quando quiser.
        </div>

    </div>
</section>
@endsection