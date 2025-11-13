@extends('layout')

@section('content')
<section class="bg-base-200 min-h-screen py-16">
  <div class="container mx-auto px-4">

    <!-- Título -->
    <div class="text-center mb-12">
      <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">Rede de Enfrentamento e Atendimento</h1>
      <p class="text-lg text-base-content/80 max-w-3xl mx-auto">
        Entenda as diferenças, conexões e ações entre as Redes de Enfrentamento e de Atendimento às Mulheres em Situação de Violência.
      </p>
    </div>

    <!-- Texto introdutório -->
    <div class="prose max-w-4xl mx-auto text-justify mb-12">
      <p class="text-lg">
        A <strong>Rede de Enfrentamento</strong> e a <strong>Rede de Atendimento</strong> à mulher em situação de violência
        diferenciam-se em suas funções. Enquanto a primeira define políticas e estratégias integradas para prevenir e
        combater a violência e garantir direitos, a segunda executa o atendimento direto e os encaminhamentos por meio
        de serviços especializados e portas de entrada.
      </p>

      <p class="text-lg">
        Embora municípios e estados brasileiros já venham articulando serviços junto à sociedade civil, a partir desta abordagem
        de rede, somente em <strong>2024</strong> foi sancionada a <strong>Lei nº 14.899</strong>, que estabelece a criação da Rede Estadual
        de Enfrentamento e da Rede de Atendimento à Mulher em Situação de Violência.
      </p>
    </div>

    <!-- Acordeões principais -->
    <div class="max-w-4xl mx-auto space-y-6">

      <div class="collapse collapse-arrow bg-base-100 shadow-md">
        <input type="radio" name="rede" checked="checked" />
        <div class="collapse-title text-xl font-semibold text-primary">
          Rede de Enfrentamento à Violência contra as Mulheres
        </div>
        <div class="collapse-content">
          <p class="text-base-content/80 leading-relaxed text-lg">
            É a articulação ampla entre instituições governamentais, não governamentais e a comunidade para planejar políticas,
            prevenção, combate, garantia de direitos e assistência. Foca em estratégias estruturais como campanhas,
            fluxos intersetoriais, responsabilização de agressores e empoderamento das mulheres, integrando os quatro eixos da
            Política Nacional: <strong>prevenção, combate, assistência e garantia de direitos</strong>.
          </p>
        </div>
      </div>

      <div class="collapse collapse-arrow bg-base-100 shadow-md">
        <input type="radio" name="rede" />
        <div class="collapse-title text-lg font-semibold text-primary">
          Rede de Atendimento às Mulheres em Situação de Violência
        </div>
        <div class="collapse-content">
          <p class="text-base-content/80 leading-relaxed text-lg">
            É o conjunto de serviços que acolhe, orienta e encaminha as mulheres no dia a dia. Reúne setores de saúde, justiça,
            segurança pública e assistência social, com dois tipos de serviços:
          </p>

          <ul class="list-disc list-inside mt-3 space-y-1">
            <li><strong>Especializados:</strong> CRAM/Núcleos, Casas-Abrigo, DEAMs, Defensorias, Juizados, Ligue 180, Ouvidorias, serviços de saúde e postos em aeroportos.</li>
            <li><strong>Não especializados:</strong> hospitais, atenção básica, delegacias comuns, PM/Polícia Federal, CRAS/CREAS, MP e Defensorias.</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Fontes -->
    <div class="max-w-4xl mx-auto mt-12">
      <div class="card bg-base-100 shadow-md p-6">
        <h2 class="text-2xl font-bold text-primary mb-3">Fontes</h2>
        <ul class="list-disc list-inside text-base-content/80 space-y-2">
          <li><a href="https://www12.senado.leg.br/institucional/omv/.../rede-de-enfrentamento-a-violencia-contra-as-mulheres" target="_blank" class="link link-primary">Secretaria de Políticas para as Mulheres (2011)</a></li>
          <li><a href="https://www.gov.br/mdh/.../politica-nacional-enfrentamento-a-violencia-versao-final.pdf" target="_blank" class="link link-primary">Política Nacional de Enfrentamento à Violência contra as Mulheres (SPM/PR, 2011)</a></li>
        </ul>
      </div>
    </div>

    <!-- Links e painéis -->
    <div class="max-w-4xl mx-auto mt-12 grid md:grid-cols-2 gap-6">

      <div class="card bg-base-100 shadow-md p-6 text-center">
        <h3 class="text-lg font-semibold text-primary mb-2">Painel da Rede de Atendimento</h3>
        <p class="text-base-content/80 mb-4">Ministério das Mulheres — indicadores e serviços em todo o Brasil.</p>
        <a href="https://www.gov.br/mulheres/pt-br/ligue180/painel-da-rede-de-atendimento" target="_blank" class="btn btn-primary">Acessar Painel</a>
      </div>

      <div class="card bg-base-100 shadow-md p-6 text-center">
        <h3 class="text-lg font-semibold text-primary mb-2">Rede de Atendimento da Bahia</h3>
        <p class="text-base-content/80 mb-4">Acompanhe nossa pesquisa e acesse o mapa de serviços e informações.</p>
        <div class="flex flex-col gap-2 text-primary">
          <a href="https://www.google.com/maps/d/viewer?mid=1_6rsqE1HE16Ck7Ihf8JE3IoIau3rHj0&z=6" target="_blank" class="btn btn-outline btn-primary btn-sm">Mapa RAM-BA</a>
          <a href="https://cmapscloud.ihmc.us/viewer/cmap/20D2MG00M-L4ZLHD-27BG27" target="_blank" class="btn btn-outline btn-primary btn-sm">Modelo de Hipertextualização</a>
          <a href="https://docs.google.com/spreadsheets/d/17NXVaPfCtXIvxOTGLrwl1QdjQQRsERcLc78jrr6PPMI/edit?usp=sharing" target="_blank" class="btn btn-outline btn-primary btn-sm">Fontes Associadas (RAM-BA)</a>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
