@extends('layout')

@section('content')
<section class="bg-base-200 min-h-screen py-12">
  <div class="container mx-auto px-4">
    <h1 class="text-4xl font-bold text-primary mb-8 text-center">Fontes sobre a pesquisa</h1>

    @foreach ($sources as $category => $items)
      <div class="collapse collapse-plus border border-base-300 bg-base-100 rounded-box mb-4">
        <input type="checkbox" class="peer" />
        <div class="collapse-title text-xl font-medium text-primary peer-checked:bg-primary/20 peer-checked:text-primary-content">
          {{ ucwords(str_replace('_', ' ', $category)) }} ({{ count($items) }})
        </div>
        <div class="collapse-content peer-checked:block">
          <div class="overflow-x-auto">
            <table class="table table-zebra w-full mt-4">
              <thead>
                <tr>
                  @foreach (array_keys($items[0]) as $header)
                    <th>{{ ucwords(str_replace('_', ' ', $header)) }}</th>
                  @endforeach
                </tr>
              </thead>
              <tbody>
                @foreach ($items as $item)
                  <tr>
                    @foreach ($item as $key => $value)
                      <td>
                        @if ($key === 'link')
                          <a href="{{ $value }}" target="_blank" class="text-primary hover:underline">{{ $value }}</a>
                        @else
                          {{ $value }}
                        @endif
                      </td>
                    @endforeach
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</section>
@endsection
