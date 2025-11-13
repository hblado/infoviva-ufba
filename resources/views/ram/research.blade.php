@extends('layout')

@section('content')
<section class="bg-base-200 min-h-screen py-16">
  <div class="container mx-auto px-4">
     <!-- Título -->
    <div class="text-center mb-12">
      <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">A Nossa Pesquisa</h1>
      <p class="text-lg text-base-content/80 max-w-3xl mx-auto">
        Conheça os órgãos e organizações que integram a Rede de Atendimento à Mulher e oferecem acolhimento, proteção e orientação em todo o estado.
      </p>
      <a href="https://docs.google.com/spreadsheets/d/17NXVaPfCtXIvxOTGLrwl1QdjQQRsERcLc78jrr6PPMI/edit?usp=sharing" target="_blank" class="btn btn-primary">Acessar Conjunto de Informações Sistematizadas</a>
    </div>
    <iframe src="https://cmapscloud.ihmc.us/viewer/cmap/20D2MG00M-L4ZLHD-27BG27?title=false&toolbar=false&footer=false" width="100%" height="460" frameborder="0" ></iframe>
    <div class="flex w-full flex-col lg:flex-row">
        <div class="card bg-base-300 rounded-box grid h-32 grow place-items-center">content</div>
        <div class="divider lg:divider-horizontal">OR</div>
        <div class="card bg-base-300 rounded-box grid h-32 grow place-items-center">content</div>
    </div>
  </div>
</section>
@endsection
