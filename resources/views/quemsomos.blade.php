@extends('layout')

@section('content')
<section class="bg-base-200 min-h-screen py-16 flex flex-col items-center">
  <div class="container mx-auto px-4 flex flex-col items-center">

    <!-- Título -->
    <div class="text-center mb-12 max-w-2xl">
      <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">Quem Somos</h1>
      <p class="text-lg text-base-content/80">
        Conheça a equipe que constrói e pesquisa a Plataforma Info Viva.
      </p>
    </div>

    <!-- Grid de pessoas -->
    <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 justify-items-center">

      @foreach ($whoWeAre as $person)
      <div class="card w-72 bg-base-100 shadow-md hover:shadow-xl transition-all duration-300 flex flex-col items-center">
        <figure class="p-2 pt-8">
          <div class="avatar">
            <div class="w-32 h-32 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2 overflow-hidden">
              <img src="{{ asset('images/equipe/' . $person['imagePath']) }}" alt="{{ $person['title'] }}" />
            </div>
          </div>
        </figure>
        <div class="card-body items-center text-center px-6 pb-8">
          <h2 class="card-title text-primary text-xl mb-3">{{ $person['title'] }}</h2>
          <p class="text-sm text-base-content/80 leading-relaxed">{{ $person['text'] }}</p>
          <div class="card-actions justify-center mt-6 space-x-3 w-full">
            <a href="{{ $person['lattes'] }}" target="_blank"
               class="btn btn-primary btn-sm w-24 text-white">Lattes</a>
            <a href="{{ $person['orcid'] }}" target="_blank"
               class="btn btn-primary btn-sm w-24 text-white">ORCID</a>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</section>
@endsection
