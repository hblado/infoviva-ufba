@extends('layout')

@section('content')
<div class="hero bg-base-200 min-h-[75vh]">
  <div class="hero-content flex-col lg:flex-row-reverse">
    <img
      src="/images/research.jpg"
      class="w-full max-w-xl rounded-lg shadow-2xl"
    />
    <div>
      <h1 class="text-5xl font-bold text-primary">Origem e base de pesquisa</h1>
      <p class="py-6">
        A Plataforma <strong>Info Viva</strong> nasce do percurso do <strong>LabRecrie </strong>— grupo de pesquisa
        certificado pela UFBA no Diretório de Grupos de Pesquisa/CNPq, com o<strong> Projeto Regime de Informação da
        Rede de Atendimento à Mulher</strong>, iniciado em 2024, —  que se consolida no âmbito da pesquisa internacional
        financiada pela Chamada nº 14 (CNPq) – Projetos Internacionais, com o pós-doutorado da <strong> Prof.ª Dra. Bruna
        Lessa</strong> na Universidad Carlos III de Madrid, em parceria com o Instituto Universitário de Estudos de Gênero e
        o Departamento de Biblioteconomia.
      </p>
      <p class="py-6">
        Desse processo resulta um framework para análise e aprimoramento das ações de informação
        em redes e serviços de atendimento à mulher, considerando características culturais, sociais e políticas
        dos territórios, e desse contexto metodológico de análise, surge o conceito de <strong>violência informativa.</strong>
      </p>
      <a href="{{ url('/objetivos') }}" class="btn btn-primary">Quais os objetivos? Para quem?</a>
    </div>
  </div>
</div>

@endsection
