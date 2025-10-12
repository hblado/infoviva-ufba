@extends('layout')

@section('content')
<div class="min-h-screen bg-base-100">
    <!-- HERO -->
    <section class="bg-pink-50 py-20">
        <div class="container mx-auto text-center px-6">
            <h1 class="text-5xl font-bold text-pink-700 mb-6">RedeCRIS Mulher</h1>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto mb-10">
            Um espaço digital de acesso público que integra e organiza informações científicas
            voltadas ao enfrentamento da violência contra a mulher no Brasil.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="https://vocesdemujeres.com/sign-up-expert" class="btn btn-primary btn-wide">
                💬 Cadastrar-se
            </a>
            <a href="https://vocesdemujeres.com/search" class="btn btn-outline btn-primary btn-wide">
                🔍 Procurar Especialista
            </a>
            </div>
        </div>
    </section>

    <!-- SOBRE -->
    <section class="py-16 px-6 max-w-5xl mx-auto">
        <div class="prose lg:prose-lg">
            <h2 class="text-2xl font-semibold text-pink-700 mb-4">O que é a RedeCRIS Mulher?</h2>
            <p>
                A <strong>RedeCRIS Mulher</strong> é um espaço digital de acesso público que integra e organiza
                informações científicas voltadas ao enfrentamento da violência contra a mulher no Brasil.
            </p>
            <p>
                Trata-se de uma iniciativa que adota os princípios dos
                <em>Sistemas de Informação de Pesquisa Corrente (CRIS — Current Research Information System)</em>,
                um modelo especializado na gestão, integração e disseminação de dados sobre a produção científica.
            </p>
            <p>
                Esses sistemas permitem mapear de forma estruturada os elementos do ecossistema de pesquisa:
                autores, instituições, linhas de pesquisa, projetos, publicações e indicadores.
                Na RedeCRIS Mulher, essa arquitetura representa, visualiza e analisa a produção acadêmica sobre
                <strong>violência contra a mulher</strong>, conectando dados, temas e pesquisadoras.
            </p>
        </div>
    </section>

    <!-- COMO FUNCIONA -->
    <section class="bg-base-200 py-16 px-6">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-2xl font-bold text-pink-700 mb-10">Como funciona</h2>
            <div class="grid gap-6 md:grid-cols-3">
                <div class="card bg-white shadow-lg p-6">
                    <div class="text-4xl mb-4">📊</div>
                    <h3 class="font-semibold text-lg mb-2">Mapeamento Científico</h3>
                    <p>Integra informações sobre pesquisas, instituições, autoras e indicadores relacionados à violência contra a mulher.</p>
                </div>
                <div class="card bg-white shadow-lg p-6">
                    <div class="text-4xl mb-4">🤝</div>
                    <h3 class="font-semibold text-lg mb-2">Colaboração em Rede</h3>
                    <p>Conecta pesquisadoras e pesquisadores, fortalecendo a troca de conhecimento e a construção coletiva.</p>
                </div>
                <div class="card bg-white shadow-lg p-6">
                    <div class="text-4xl mb-4">🔍</div>
                    <h3 class="font-semibold text-lg mb-2">Busca Avançada</h3>
                    <p>Permite localizar especialistas, projetos e temas específicos em poucos cliques.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA FINAL -->
    <section class="text-center py-16">
        <h2 class="text-2xl font-bold text-pink-700 mb-4">Participe da RedeCRIS Mulher</h2>
        <p class="text-gray-600 mb-8">Contribua com o mapeamento da pesquisa brasileira sobre o enfrentamento da violência contra as mulheres.</p>
        <a href="https://vocesdemujeres.com/sign-up-expert" class="btn btn-primary btn-lg">Quero me cadastrar</a>
    </section>
</div>
@endsection
