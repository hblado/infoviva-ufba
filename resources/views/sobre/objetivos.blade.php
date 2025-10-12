@extends('layout')

@section('content')
<section class="bg-base-200 min-h-screen py-16">
  <div class="container mx-auto px-4">
    <!-- Título principal -->
    <div class="text-center mb-12">
      <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">Objetivos</h1>
      <p class="text-lg text-base-content/80 max-w-2xl mx-auto">
        Nosso objetivo é disponibilizar informação estruturada e acessível, fortalecendo o enfrentamento à violência contra as mulheres.
      </p>
    </div>

    <!-- Grade de cartões -->
    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
      <div class="card bg-base-100 shadow-md border border-base-300">
        <div class="card-body">
          <h2 class="card-title text-primary">Observatório das ações informacionais</h2>
          <p>Monitoramento de iniciativas, indicadores e boas práticas.</p>
        </div>
      </div>

      <div class="card bg-base-100 shadow-md border border-base-300">
        <div class="card-body">
          <h2 class="card-title text-primary">Mapas e painéis interativos</h2>
          <p>Serviços da rede, percursos de atendimento e dados públicos correlatos.</p>
        </div>
      </div>

      <div class="card bg-base-100 shadow-md border border-base-300">
        <div class="card-body">
          <h2 class="card-title text-primary">Repositório formativo</h2>
          <p>Materiais de linguagem simples para mulheres e equipes da rede.</p>
        </div>
      </div>

      <div class="card bg-base-100 shadow-md border border-base-300">
        <div class="card-body">
          <h2 class="card-title text-primary">Trilhas de direitos</h2>
          <p>Rotas de acesso a serviços e garantias, passo a passo e com glossário.</p>
        </div>
      </div>

      <div class="card bg-base-100 shadow-md border border-base-300">
        <div class="card-body">
          <h2 class="card-title text-primary">Catálogo de evidências</h2>
          <p>Estudos, relatórios e bases de dados para gestão e advocacy.</p>
        </div>
      </div>

      <div class="card bg-base-100 shadow-md border border-base-300">
        <div class="card-body">
          <h2 class="card-title text-primary">Ferramentas de co-criação</h2>
          <p>Processos colaborativos com a rede, a sociedade civil e a academia.</p>
        </div>
      </div>
    </div>

    <!-- Público-alvo -->
    <div class="mt-20">
      <h2 class="text-4xl font-bold text-primary text-center mb-10">Para quem</h2>
      <div class="grid gap-6 md:grid-cols-2">
        <div class="card bg-base-100 shadow-sm border border-base-300">
          <div class="card-body">
            <p><strong>Mulheres</strong> em busca de informação confiável e caminhos de acesso à rede.</p>
          </div>
        </div>
        <div class="card bg-base-100 shadow-sm border border-base-300">
          <div class="card-body">
            <p><strong>Profissionais da rede</strong> (saúde, assistência, justiça, segurança, educação) que precisam de referências claras e integradas.</p>
          </div>
        </div>
        <div class="card bg-base-100 shadow-sm border border-base-300">
          <div class="card-body">
            <p><strong>Gestoras/es públicas/os</strong> que demandam dados e evidências para decisões e políticas.</p>
          </div>
        </div>
        <div class="card bg-base-100 shadow-sm border border-base-300">
          <div class="card-body">
            <p><strong>Pesquisadoras/es, jornalistas e movimentos sociais</strong> que atuam em defesa de direitos das mulheres.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
