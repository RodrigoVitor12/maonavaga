@extends('layouts.app')

@section('title', 'Termos de Privacidade - MaoNaVaga')

@section('content')
    <section class="min-h-screen bg-gray-50 py-20">
    <div class="max-w-4xl mx-auto px-6">

        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                Política de Privacidade
            </h1>

            <p class="text-gray-600 text-lg leading-relaxed">
                Sua privacidade é importante para nós. Esta Política de Privacidade explica
                como o Mão na Vaga coleta, utiliza e protege as informações dos usuários da plataforma.
            </p>
        </div>

        <!-- Conteúdo -->
        <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-8 md:p-12 space-y-10">

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    1. Informações Coletadas
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Podemos coletar informações fornecidas diretamente pelos usuários, como:
                </p>

                <ul class="list-disc pl-6 mt-4 space-y-2 text-gray-600">
                    <li>Nome completo</li>
                    <li>E-mail</li>
                    <li>Telefone</li>
                    <li>Currículo profissional</li>
                    <li>Dados da empresa</li>
                    <li>Informações de vagas publicadas</li>
                </ul>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    2. Como Utilizamos os Dados
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    As informações coletadas são utilizadas para:
                </p>

                <ul class="list-disc pl-6 mt-4 space-y-2 text-gray-600">
                    <li>Permitir candidaturas em vagas</li>
                    <li>Facilitar o contato entre empresas e candidatos</li>
                    <li>Melhorar a experiência na plataforma</li>
                    <li>Enviar notificações relacionadas às vagas e candidaturas</li>
                    <li>Garantir segurança e funcionamento do sistema</li>
                </ul>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    3. Compartilhamento de Informações
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    O Mão na Vaga não vende informações pessoais dos usuários.
                    Os dados poderão ser compartilhados apenas entre candidatos e empresas
                    dentro do funcionamento da plataforma.
                </p>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    4. Segurança dos Dados
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Adotamos medidas de segurança para proteger as informações dos usuários
                    contra acessos não autorizados, alteração, divulgação ou destruição indevida.
                </p>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    5. Direitos dos Usuários
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Os usuários podem solicitar atualização, correção ou exclusão de seus dados pessoais
                    a qualquer momento através dos canais de contato da plataforma.
                </p>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    6. Cookies e Tecnologias
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    O Mão na Vaga pode utilizar cookies e tecnologias semelhantes para melhorar
                    a navegação, segurança e personalização da experiência do usuário.
                </p>
            </div>

            <!-- Seção -->
            <div>
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    7. Alterações nesta Política
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Esta Política de Privacidade poderá ser atualizada periodicamente.
                    Recomendamos que os usuários revisem esta página regularmente.
                </p>
            </div>

            <!-- Contato -->
            <div class="border-t border-gray-200 pt-8">
                <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                    8. Contato
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Caso tenha dúvidas sobre esta Política de Privacidade, entre em contato:
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