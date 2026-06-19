@extends('frontend.layouts.app')

@section('title', 'Premium Products - TextileExport Pro')

@section('content')

<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-900 to-green-800 text-white section-padding">
  <div class="container-max px-4">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Products</h1>
    <p class="text-lg">Premium garments manufactured to export quality standards</p>
  </div>
</section>


<!-- Products Grid -->
@foreach($page->sections as $section)

<section class="section-padding">
  <div class="container-max px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      @foreach($section->posts as $post)

      <div id="post-{{ $post->id }}"
        class="product-card rounded-lg overflow-hidden card-shadow bg-white product-item"
        data-category="{{ $post->type }}">

        <img src="{{ asset('storage/'.$post->image) }}"
          alt="{{ $post->title }}"
          class="w-full h-60 object-cover">

        <div class="p-6">

          <h3 class="text-xl font-bold text-blue-900 mb-2">
            {{ $post->title }}
          </h3>

          <p class="text-gray-600 mb-4">
            {{ $post->excerpt }}
          </p>

          <div class="mb-4 space-y-1">
            <p class="text-sm">
              {!! $post->body !!}
            </p>
          </div>

          <a href="{{ route('contact') }}?product={{ $post->id }}"
            class="btn-primary text-sm w-full text-center block">
            Contact
          </a>

        </div>
      </div>

      @endforeach

    </div>
  </div>
</section>

@endforeach

<!-- Production Capacity -->
<section class="section-padding bg-gray-50">
  <div class="container-max px-4">
    <h2 class="text-3xl font-bold gradient-text mb-8">Production Capacity & Capabilities</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white p-8 rounded-lg card-shadow">
        <h3 class="text-2xl font-bold text-blue-900 mb-4">Monthly Output</h3>
        <p class="text-4xl font-bold text-green-700 mb-2">500,000+</p>
        <p class="text-gray-600">Units per month capacity</p>
      </div>
      <div class="bg-white p-8 rounded-lg card-shadow">
        <h3 class="text-2xl font-bold text-blue-900 mb-4">Lead Time</h3>
        <p class="text-4xl font-bold text-green-700 mb-2">30-45</p>
        <p class="text-gray-600">Days from order confirmation</p>
      </div>
      <div class="bg-white p-8 rounded-lg card-shadow">
        <h3 class="text-2xl font-bold text-blue-900 mb-4">Quality Control</h3>
        <p class="text-4xl font-bold text-green-700 mb-2">99.8%</p>
        <p class="text-gray-600">Pass rate on first inspection</p>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="section-padding bg-gradient-to-r from-blue-900 to-green-800">
  <div class="container-max text-center text-white px-4">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">Need Custom Products?</h2>
    <p class="text-lg mb-8">We offer customization options for colors, sizing, and branding</p>
    <a href="{{ route('contact') }}" class="inline-block px-12 py-4 bg-white text-blue-900 font-semibold rounded-lg hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">Send Inquiry</a>
  </div>
</section>

@endsection

@push('scripts')
<script>
  function filterProducts(category) {
    const items = document.querySelectorAll('.product-item');
    const buttons = document.querySelectorAll('.filter-btn');
    buttons.forEach(btn => btn.classList.remove('active'));
    event.target.classList.add('active');
    items.forEach(item => {
      if (category === 'all' || item.dataset.category === category) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  }
</script>
@endpush