@extends('layouts.app')

@section('title', 'Termos de uso - Mao Na Vaga')

@section('content')
    <section class="min-h-screen bg-gray-50 py-20">
    <div class="max-w-4xl mx-auto px-6">

        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                Termos de Uso
            </h1>

            <p class="text-gray-600 text-lg leading-relaxed">
                Estes Termos de Uso regulam o acesso e utilização da plataforma Mão na Vaga.
                Ao utilizar nossos serviços, você concorda com as condições descritas abaixo.
            </p>
        </div>

        <!-- Conteúdo -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-8 md:p-12 space-y-10">

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    1. Sobre a Plataforma
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    O Mão na Vaga é uma plataforma online que conecta empresas e candidatos
                    para divulgação de vagas de emprego e oportunidades profissionais
                    no Sul de Minas e região.
                </p>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    2. Cadastro de Usuários
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Para utilizar determinadas funcionalidades da plataforma, será necessário
                    realizar um cadastro com informações verdadeiras, completas e atualizadas.
                </p>

                <p class="text-gray-600 leading-relaxed mt-4">
                    O usuário é responsável pela segurança de sua conta e senha de acesso.
                </p>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    3. Responsabilidades dos Candidatos
                </h2>

                <ul class="list-disc pl-6 space-y-2 text-gray-600">
                    <li>Fornecer informações verdadeiras em currículos e perfis</li>
                    <li>Utilizar a plataforma de forma ética e legal</li>
                    <li>Não compartilhar conteúdos ofensivos, falsos ou ilegais</li>
                    <li>Manter seus dados atualizados</li>
                </ul>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    4. Responsabilidades das Empresas
                </h2>

                <ul class="list-disc pl-6 space-y-2 text-gray-600">
                    <li>Publicar vagas legítimas e verdadeiras</li>
                    <li>Respeitar a privacidade dos candidatos</li>
                    <li>Utilizar os dados apenas para fins de recrutamento</li>
                    <li>Não publicar conteúdos discriminatórios ou ilegais</li>
                </ul>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    5. Planos e Pagamentos
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Alguns recursos da plataforma poderão estar disponíveis apenas mediante
                    contratação de planos pagos.
                </p>

                <p class="text-gray-600 leading-relaxed mt-4">
                    Os valores, funcionalidades e condições dos planos poderão ser alterados
                    mediante aviso prévio aos usuários.
                </p>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    6. Limitação de Responsabilidade
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    O Mão na Vaga atua apenas como intermediador entre empresas e candidatos,
                    não sendo responsável por processos seletivos, contratações, desligamentos
                    ou informações fornecidas pelos usuários.
                </p>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    7. Suspensão ou Encerramento de Conta
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    O Mão na Vaga poderá suspender ou remover contas que violem estes Termos de Uso,
                    utilizem a plataforma de forma indevida ou pratiquem atividades ilegais.
                </p>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    8. Alterações nos Termos
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Estes Termos de Uso poderão ser atualizados periodicamente.
                    Recomendamos a revisão regular desta página.
                </p>
            </div>

            <!-- Contato -->
            <div class="border-t border-gray-200 pt-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    9. Contato
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Em caso de dúvidas sobre estes Termos de Uso, entre em contato:
                </p>

                <div class="mt-4 space-y-2 text-gray-700">
                    <p>📧 maonavaga26@gmail.com</p>
                    <p>📍 Santa Rita do Sapucaí - MG</p>
                </div>
            </div>

        </div>

        <!-- Rodapé -->
        <div class="mt-10 text-center text-sm text-gray-500">
            Última atualização: Maio de 2026
        </div>

    </div>
</section>
@endsection