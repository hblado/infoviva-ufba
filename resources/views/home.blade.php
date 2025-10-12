@extends('layout')

@section('content')
<section class="hero min-h-[80vh] bg-cover bg-center relative" style="background-image: url('/images/projetocolabora.jpg');">
  <div class="absolute inset-0 bg-black/65"></div>

  <div class="hero-content flex-col lg:flex-row relative text-white">
    <img 
      src="/images/logo/infoviva_logo_claro.png"
      width="300"
      height="300"
      class="max-w-sm rounded-lg shadow-2xl hidden lg:block" 
      alt="Mulheres unidas de mãos dadas formando um círculo." 
    />
    <div class="max-w-lg">
      <h1 class="text-5xl font-bold">
        Conhecimento é vida.<br> Acesso é resistência.
      </h1>
      <p class="py-6 text-lg">
        A Info Viva é um espaço digital para fortalecer o enfrentamento à violência contra as mulheres
        através de informação, dados e redes de apoio.
      </p>
      <a href="{{ url('/pesquisa') }}" class="btn btn-primary">
        Conheça a Info Viva
      </a>
    </div>
  </div>
</section>
@endsection
