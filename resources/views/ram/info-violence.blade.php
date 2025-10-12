@extends('layout')

@section('content')
<section class="min-h-screen bg-base-200 py-16">
  <div class="container mx-auto px-4">

    <!-- Frase de impacto -->
    <!-- Frase de impacto -->
    <div class="hero bg-primary text-primary-content rounded-2xl shadow-lg mb-12">
      <div class="hero-content text-center py-16">
        <div class="max-w-3xl">
          <h1 class="text-3xl md:text-5xl font-bold leading-snug">
            “A ausência de conhecimento é uma forma de silenciamento.”
          </h1>
          <p class="mt-6 text-lg opacity-90">
            Mulheres que não têm acesso a informações sobre seus direitos, serviços de apoio, ou mesmo letramento sobre violência,
            são efetivamente impedidas de agir, denunciar ou se proteger.
          </p>
        </div>
      </div>
    </div>

    <!-- Card principal -->
    <div class="card bg-base-100 shadow-xl p-8 max-w-4xl mx-auto">
      <h2 class="text-2xl md:text-3xl font-bold text-primary mb-4">Violência Informativa</h2>

      <p class="text-base-content/80 leading-relaxed mb-6">
        A <strong>violência informativa</strong>, conceito desenvolvido pela <strong>Profa. Bruna Lessa</strong>, coordenadora da
        Plataforma InfoViva, refere-se ao conjunto de opressões que ocorrem simultaneamente, favorecendo a negação e/ou
        restrição sistemática do acesso à informação e à formação feminista necessária para que a mulher possa tomar decisões
        informadas sobre suas vidas e direitos.
      </p>

      <p class="text-base-content/80 leading-relaxed mb-8">
        É também a manipulação, compartilhamento ou omissão de informações que afetam a vida e a dignidade de mulheres — uma
        forma insidiosa de opressão que se entrelaça com outras manifestações de violência, criando um ciclo vicioso que
        perpetua a desigualdade e a discriminação.
      </p>

      <!-- Vídeo vertical -->
      <div class="flex justify-center">
        <div class="w-full max-w-sm aspect-[9/16] rounded-2xl overflow-hidden shadow-md">
          <iframe
            src="https://drive.google.com/file/d/1rXhNOFd2nyfHI0Vifrw25PIj6V23rLhE/preview"
            allow="autoplay"
            class="w-full h-full border-0 rounded-2xl">
          </iframe>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
