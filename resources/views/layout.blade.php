<!DOCTYPE html>
<html data-theme="infoviva">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'InfoViva' }}</title>
    <link rel="icon" type="image/x-icon" href="/images/logo/infoviva_icon_white.png">
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col min-h-screen">

    <!-- Navbar Responsiva -->
    <nav class="navbar bg-base-100 shadow-sm">
        <div class="navbar-start">
            <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /> </svg>
            </div>
            <ul
                tabindex="0"
                class="menu menu-sm dropdown-content bg-base-100 rounded-box z-50 mt-3 p-4 w-auto max-w-xs shadow text-lg">
                <li>
                    <a>Sobre</a>
                    <ul class="p-2">
                        <li><a href="{{url("/pesquisa")}}">A Pesquisa</a></li>
                        <li><a href="{{url("/objetivos")}}">Objetivos / Para quem?</a></li>
                    </ul>
                </li>
                <li><a href="{{url("/quem-somos")}}">Quem Somos</a></li>
                <li><a href="{{url("/faq")}}">Perguntas Frequentes</a></li>
                <li>
                    <a>Rede de Atenção à Mulher</a>
                    <ul class="p-2">
                        <li><a href="{{url("/ram/sobre")}}" >Sobre a Rede</a></li>
                        <li><a href="{{url("/ram/violencia")}}">O que é violência contra a mulher?</a></li>
                        <li><a href="{{url("/ram/dados")}}">Indicadores e Dados Governamentais</a></li>
                        <li><a href="{{url("/ram/violencia-informativa")}}">O que é violência informativa?</a></li>
                    </ul>
                </li>
                <li><a class="whitespace-nowrap" href="{{url('/fontes')}}">Fontes de Informação Sobre a Mulher</a></li>
                <li><a href={{url("/redecris")}}>RedeCRIS Mulher</a></li>
            </ul>
            </div>
            <a href="{{url('/')}}" class="btn btn-ghost text-xl"><img src="/images/logo/infoviva.png" width="100" /></a>
        </div>
        <div class="navbar-center hidden lg:flex z-50">
            <ul class="menu menu-horizontal px-1">
            <li>
                <details>
                <summary>Sobre</summary>
                <ul class="p-2">
                    <li><a href="{{url("/pesquisa")}}">A Pesquisa</a></li>
                    <li><a href="{{url("/objetivos")}}" class="whitespace-nowrap">Objetivos / Para quem?</a></li>
                </ul>
                </details>
            </li>
            <li><a href="{{url("/quem-somos")}}">Quem Somos</a></li>
            <li><a href="{{url("/faq")}}">Perguntas Frequentes</a></li>
            <li>
                <details>
                <summary>Rede de Atenção à Mulher</summary>
                <ul class="p-2">
                    <li><a href="{{url("/ram/sobre")}}" >Sobre a Rede</a></li>
                    <li><a href="{{url("/ram/violencia")}}" class="whitespace-nowrap">O que é violência contra a mulher?</a></li>
                    <li><a href="{{url("/ram/dados")}}" class="whitespace-nowrap">Indicadores e Dados Governamentais</a></li>
                    <li><a href="{{url("/ram/violencia-informativa")}}" class="whitespace-nowrap">O que é violência informativa?</a></li>
                </ul>
                </details>
            </li>
            <li><a href="{{url('/fontes')}}" >Fontes de Informação Sobre a Mulher</a></li>
            <li><a href={{url("/redecris")}}>RedeCRIS Mulher</a></li>
            </ul>
        </div>
    </nav>

    <!-- Conteúdo principal -->
    <main class="flex-1 container mx-auto p-4">
        @yield('content')
    </main>

    <!-- Rodapé -->
    <footer class="footer footer-center p-4 bg-base-300 text-base-content">
        <p>© {{ date('Y') }} InfoViva — Todos os direitos reservados</p>
    </footer>

    <!-- Script menu mobile -->
    <script>
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');

        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>

        {{-- VLibras --}}
    <div vw class="enabled vwblibras">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>

</body>

</html>
