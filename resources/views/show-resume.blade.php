<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo - {{ $data->full_name }}</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
    @media print {

        /* Esconde tudo */
        body * {
            visibility: hidden;
        }

        /* Mostra apenas o currículo */
        #curriculo, #curriculo * {
            visibility: visible;
        }

        /* Faz o currículo ocupar a página inteira */
        #curriculo {
            position: absolute;
            left: 0;
            top: 20;
            width: 100%;
        }

        /* Remove botão de imprimir */
        button {
            display: none !important;
        }

        /* Remove fundo cinza */
        body {
            background: white !important;
        }

        /* Remove URL e numeração */
        @page {
            margin: 0;
        }
    }
</style>
</head>

<body class="bg-gray-200 min-h-screen flex flex-col items-center py-10 px-4">

    <!-- Botões -->
    <div class="no-print w-full max-w-5xl flex justify-between mb-6">
        <a href="{{ route('dashboard') }}"
           class="px-4 py-2 bg-gray-600 text-white font-semibold rounded-lg shadow hover:bg-gray-700 transition">
            ← Voltar
        </a>

        <button onclick="window.print()"
                class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow hover:bg-blue-700 transition">
            🖨 Imprimir Currículo
        </button>
    </div>
    

    <!-- Container Principal -->
    <div id="curriculo" class="resume-container w-full max-w-5xl bg-white shadow-2xl grid grid-cols-3">

        <!-- COLUNA ESQUERDA -->
        <div class="bg-blue-700 text-white p-8 col-span-1">

            <!-- Nome -->
            <h1 class="text-2xl font-bold leading-snug">
                {{ $data->full_name }}
            </h1>

            <div class="mt-6 space-y-2 text-sm">
                <p>📧 {{ $data->email }}</p>
                <p>📱 {{ $data->phone }}</p>
                <p>📍 {{ $data->city }}</p>
            </div>

            <!-- Habilidades -->
            @if($data->skills)
            <div class="mt-8">
                <h2 class="text-sm font-bold uppercase tracking-wider border-b border-blue-300 pb-2 mb-3">
                    Habilidades
                </h2>

                <ul class="space-y-1 text-sm">
                    @foreach(explode(',', $data->skills) as $skill)
                        <li>• {{ trim($skill) }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <!-- Idiomas -->
            @if($data->languages)
            <div class="mt-8">
                <h2 class="text-sm font-bold uppercase tracking-wider border-b border-blue-300 pb-2 mb-3">
                    Idiomas
                </h2>

                <p class="text-sm">
                    {{ $data->languages }}
                </p>
            </div>
            @endif

        </div>

        <!-- COLUNA DIREITA -->
        <div class="p-10 col-span-2">

            <!-- Resumo -->
            @if($data->summary)
            <section class="mb-10">
                <h2 class="text-lg font-bold text-blue-700 uppercase tracking-wide border-b pb-2 ">
                    Resumo Profissional
                </h2>

                <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                    {{ $data->summary }}
                </p>
            </section>
            @endif

            <!-- Experiência -->
            @if($data->experiences->count())
            <section class="mb-10">
                <h2 class="text-lg font-bold text-blue-700 uppercase tracking-wide border-b pb-2">
                    Experiência Profissional
                </h2>

                @foreach($data->experiences as $experience)
                    <div class="mb-6">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="font-semibold text-gray-900">
                                    {{ $experience->position }}
                                </p>
                                <p class="text-blue-700 font-medium">
                                    {{ $experience->company }}
                                </p>
                            </div>
                            <p class="text-sm text-gray-500">
                                {{ $experience->start_date }} - {{ $experience->end_date ?? 'Atual' }}
                            </p>
                        </div>

                        <p class="mt-2 text-gray-700 whitespace-pre-line">
                            {{ $experience->activities }}
                        </p>
                    </div>
                @endforeach
            </section>
            @endif

            <!-- Formação -->
            @if($data->educations->count())
            <section>
                <h2 class="text-lg font-bold text-blue-700 uppercase tracking-wide border-b pb-2">
                    Formação Acadêmica
                </h2>

                @foreach($data->educations as $education)
                    <div class="mb-5">
                        <div class="flex justify-between">
                            <div>
                                <p class="font-semibold text-gray-900">
                                    {{ $education->course_type }}
                                </p>
                                <p class="text-gray-700">
                                    {{ $education->institution }}
                                </p>
                            </div>
                            <p class="text-sm text-gray-500">
                                {{ $education->status }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </section>
            @endif

        </div>

    </div>

</body>
</html>