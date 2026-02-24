<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Básico -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/logo.png" />

    <!-- SEO Principal -->
    <title>@yield('title', 'Vagas de Emprego em Santa Rita do Sapucaí | MãoNaVaga')</title>
    <meta name="description" content="@yield('meta_description', 'Encontre vagas de emprego atualizadas ou anuncie sua vaga gratuitamente em Santa Rita do Sapucaí e região. Plataforma local MãoNaVaga.')">
    <meta name="keywords" content="@yield('meta_keywords', 'vagas em santa rita do sapucai, emprego santa rita, anunciar vaga, contratar funcionario', 'estagio em santa rita')">
    <meta name="author" content="MãoNaVaga">

    <!-- Indexação -->
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('og_title', 'Vagas de Emprego em Santa Rita | MãoNaVaga')">
    <meta property="og:description" content="@yield('og_description', 'Conectando empresas e candidatos em Santa Rita do Sapucaí.')">
    <meta property="og:image" content="@yield('og_image', asset('logo.png'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="MãoNaVaga">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Vagas em Santa Rita | MãoNaVaga')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Anuncie vagas e encontre empregos na sua cidade.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('logo.png'))">

    <!-- Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Shepherd CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shepherd.js/dist/css/shepherd.css" />

    <!-- Shepherd JS -->
    <script src="https://cdn.jsdelivr.net/npm/shepherd.js/dist/js/shepherd.min.js"></script>
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2WM5L3K0W4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2WM5L3K0W4');
</script>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-7020431800764481"
     crossorigin="anonymous"></script>
<body>

    @auth
        <livewire:navigation-auth />
    @endauth
    @guest
        <x-navbar />
    @endguest

    <div class="min-h-[400px]">
        @yield('content')
    </div>

    <x-footer />

   
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>