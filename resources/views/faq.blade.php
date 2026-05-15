@extends('layouts.app')

@section('title', 'Ajuda - Mao Na Vaga')

@section('content')
    <section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6">

        <!-- Título -->
        <div class="text-center mb-14">
            <h2 class="text-4xl font-bold text-gray-900">
                Perguntas Frequentes
            </h2>

            <p class="text-gray-600 mt-4 text-lg">
                Tire suas dúvidas sobre o Mão na Vaga.
            </p>
        </div>

        <!-- FAQ -->
        <div class="space-y-4">

            <!-- Item -->
            <details class="group border border-gray-200 rounded-2xl p-6 transition-all duration-300 hover:border-blue-500">
                <summary class="flex items-center justify-between cursor-pointer list-none">
                    <h3 class="text-lg font-semibold text-gray-900">
                        O Mão na Vaga é gratuito?
                    </h3>

                    <span class="text-blue-600 text-2xl transition-transform duration-300 group-open:rotate-45">
                        +
                    </span>
                </summary>

                <p class="text-gray-600 mt-4 leading-relaxed">
                    Sim. Candidatos podem criar currículo e se candidatar às vagas gratuitamente.
                    Empresas também podem testar a plataforma com o plano gratuito.
                </p>
            </details>

            <!-- Item -->
            <details class="group border border-gray-200 rounded-2xl p-6 transition-all duration-300 hover:border-blue-500">
                <summary class="flex items-center justify-between cursor-pointer list-none">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Quais cidades o Mão na Vaga atende?
                    </h3>

                    <span class="text-blue-600 text-2xl transition-transform duration-300 group-open:rotate-45">
                        +
                    </span>
                </summary>

                <p class="text-gray-600 mt-4 leading-relaxed">
                    O Mão na Vaga conecta empresas e profissionais de Santa Rita do Sapucaí,
                    Pouso Alegre, Itajubá e todo o Sul de Minas.
                </p>
            </details>

            <!-- Item -->
            <details class="group border border-gray-200 rounded-2xl p-6 transition-all duration-300 hover:border-blue-500">
                <summary class="flex items-center justify-between cursor-pointer list-none">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Como as empresas recebem candidatos?
                    </h3>

                    <span class="text-blue-600 text-2xl transition-transform duration-300 group-open:rotate-45">
                        +
                    </span>
                </summary>

                <p class="text-gray-600 mt-4 leading-relaxed">
                    Após publicar uma vaga, a empresa começa a receber candidaturas diretamente
                    pela plataforma e pode visualizar currículos organizados em um painel simples.
                </p>
            </details>

            <!-- Item -->
            <details class="group border border-gray-200 rounded-2xl p-6 transition-all duration-300 hover:border-blue-500">
                <summary class="flex items-center justify-between cursor-pointer list-none">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Posso divulgar vagas gratuitamente?
                    </h3>

                    <span class="text-blue-600 text-2xl transition-transform duration-300 group-open:rotate-45">
                        +
                    </span>
                </summary>

                <p class="text-gray-600 mt-4 leading-relaxed">
                    Sim. Empresas podem começar gratuitamente e testar a plataforma antes
                    de contratar um plano.
                </p>
            </details>

            <!-- Item -->
            <details class="group border border-gray-200 rounded-2xl p-6 transition-all duration-300 hover:border-blue-500">
                <summary class="flex items-center justify-between cursor-pointer list-none">
                    <h3 class="text-lg font-semibold text-gray-900">
                        O Mão na Vaga emite nota fiscal?
                    </h3>

                    <span class="text-blue-600 text-2xl transition-transform duration-300 group-open:rotate-45">
                        +
                    </span>
                </summary>

                <p class="text-gray-600 mt-4 leading-relaxed">
                    Sim. Todos os planos pagos possuem emissão de nota fiscal para empresas.
                </p>
            </details>

            <details class="group border border-gray-200 rounded-2xl p-6 transition-all duration-300 hover:border-blue-500">
                <summary class="flex items-center justify-between cursor-pointer list-none">
                    <h3 class="text-lg font-semibold text-gray-900">
                        Posso cancelar a qualquer momento?
                    </h3>

                    <span class="text-blue-600 text-2xl transition-transform duration-300 group-open:rotate-45">
                        +
                    </span>
                </summary>

                <p class="text-gray-600 mt-4 leading-relaxed">
                    Sim. Empresas podem cancelar o plano a qualquer momento sem burocracia.
                </p>
            </details>

        </div>
    </div>
</section>
@endsection