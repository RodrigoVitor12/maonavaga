<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Currículo - {{ $data->full_name }}</title>

<script src="https://cdn.tailwindcss.com"></script>

<style>
@page {
    size: A4;
    margin: 20mm;
}

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

<body class="bg-gray-200 py-10 font-sans text-gray-900">

<!-- BOTÕES -->
<div class="no-print max-w-3xl mx-auto flex justify-between mb-6">

<a href="{{ route('dashboard') }}"
class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
← Voltar
</a>

<button onclick="window.print()"
class="px-6 py-2 bg-black text-white rounded hover:bg-gray-800">
Imprimir
</button>

</div>


<!-- CURRÍCULO -->
<div id="curriculo" class="max-w-3xl mx-auto bg-white p-12">

<!-- NOME -->
<h1 class="text-4xl font-extrabold tracking-wide">
{{ $data->full_name }}
</h1>

<hr class="my-6 border-gray-400">

<!-- CONTATO -->
<div class="flex flex-wrap gap-8 text-sm items-center">

@if($data->phone)
<div class="flex items-center gap-2">
<span>📞</span>
<span>{{ $data->phone }}</span>
</div>
@endif

@if($data->email)
<div class="flex items-center gap-2">
<span>✉️</span>
<span>{{ $data->email }}</span>
</div>
@endif

@if($data->city)
<div class="flex items-center gap-2">
<span>📍</span>
<span>{{ $data->city }}</span>
</div>
@endif

@if($data->birth_date)
<div class="flex items-center gap-2">
<span>🎂</span>
<span>{{ $data->birth_date }}</span>
</div>
@endif

</div>

<hr class="my-6 border-gray-400">


<!-- RESUMO PROFISSIONAL -->
@if($data->summary)
<section class="mb-8">

<h2 class="font-bold text-lg uppercase mb-3">
Resumo Profissional
</h2>

<p class="text-sm leading-relaxed whitespace-pre-line">
{{ $data->summary }}
</p>

</section>
@endif



<!-- HABILIDADES -->
@if($data->skills)
<section class="mb-8">

<h2 class="font-bold text-lg uppercase mb-3">
Habilidades
</h2>

<p class="text-sm leading-relaxed">
{{ $data->skills }}
</p>

</section>
@endif



<!-- FORMAÇÃO -->
@if($data->educations->count())
<section class="mb-8">

<h2 class="font-bold text-lg uppercase mb-4">
Formação
</h2>

<div class="space-y-4">

@foreach($data->educations as $education)

<div>

<p class="font-bold text-sm">
{{ $education->course_type }} | {{ $education->institution }}
</p>

<p class="text-sm text-gray-700">
{{ $education->status }}
</p>

</div>

@endforeach

</div>

</section>
@endif



<!-- EXPERIÊNCIAS -->
@if($data->experiences->count())
<section>

<h2 class="font-bold text-lg uppercase mb-4">
Experiências
</h2>

<div class="space-y-6">

@foreach($data->experiences as $experience)

<div>

<p class="font-bold text-sm">
{{ $experience->start_date }} - {{ $experience->end_date ?? 'Atual' }} | {{ $experience->company }}
</p>

<p class="text-sm font-medium">
{{ $experience->position }}
</p>

<p class="text-sm text-gray-700 mt-1 whitespace-pre-line">
{{ $experience->activities }}
</p>

</div>

@endforeach

</div>

</section>
@endif



<!-- IDIOMAS -->
@if($data->languages)
<section class="mt-8">

<h2 class="font-bold text-lg uppercase mb-2">
Idiomas
</h2>

<p class="text-sm">
{{ $data->languages }}
</p>

</section>
@endif


</div>

</body>
</html>