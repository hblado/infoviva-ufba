@extends('layout')

@section('content')
<section class="bg-base-200 min-h-screen py-16">
  <div class="container mx-auto px-4">

    <!-- Título -->
    <div class="text-center mb-12">
      <h1 class="text-4xl md:text-5xl font-bold text-primary mb-4">Perguntas Frequentes</h1>
      <p class="text-lg text-base-content/80 max-w-2xl mx-auto">
        Encontre respostas para as dúvidas mais comuns sobre a Plataforma Info Viva.
      </p>
    </div>

    <!-- Acordeão -->
    <div class="max-w-3xl mx-auto">
      @foreach ($faq as $item)
        <div class="collapse collapse-arrow bg-base-100 shadow-sm mb-4">
          <input type="checkbox" />
          <div class="collapse-title text-lg font-medium text-primary">
            {{ $item['question'] }}
          </div>
          <div class="collapse-content text-base-content/80">
            <p>{{ $item['answer'] }}</p>
          </div>
        </div>
      @endforeach
    </div>

  </div>
</section>
@endsection
