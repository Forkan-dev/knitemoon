@extends('frontend.layouts.app')

@section('title', 'Premium Textile & Garments Export - Global Manufacturing Excellence')
@section('meta_description', 'Leading textile and garments manufacturer with ISO, BSCI, WRAP, and OEKO-TEX certifications. Export quality products worldwide.')

@section('content')

  <!-- Hero Slider Section -->
  <section id="hero-slider" class="relative w-full h-96 md:h-screen bg-gray-900 overflow-hidden">
    <div class="slide absolute inset-0 flex items-center justify-center transition-opacity duration-500">
      <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1200&h=600&fit=crop" alt="Premium Garments Manufacturing" class="absolute inset-0 w-full h-full object-cover">
      <div class="absolute inset-0 bg-black/40"></div>
      <div class="container-max text-center text-white z-10 px-4">
        <h2 class="text-4xl md:text-6xl font-bold mb-4 text-balance">Premium Garments Manufacturing Excellence</h2>
        <p class="text-lg md:text-xl mb-8 text-balance">Global export quality with ISO and international certifications</p>
        <a href="{{ route('contact') }}" class="btn-primary inline-block">Explore Products</a>
      </div>
    </div>
    <div class="slide hidden absolute inset-0 flex items-center justify-center transition-opacity duration-500">
      <img src="https://images.unsplash.com/photo-1517256673520-5ba93db77e9e?w=1200&h=600&fit=crop" alt="Professional Textile Manufacturing" class="absolute inset-0 w-full h-full object-cover">
      <div class="absolute inset-0 bg-black/40"></div>
      <div class="container-max text-center text-white z-10 px-4">
        <h2 class="text-4xl md:text-6xl font-bold mb-4 text-balance">Export Quality Standards</h2>
        <p class="text-lg md:text-xl mb-8 text-balance">Trusted by global brands for over 20 years</p>
        <a href="{{ route('products') }}" class="btn-primary inline-block">View Products</a>
      </div>
    </div>
    <div class="slide hidden absolute inset-0 flex items-center justify-center transition-opacity duration-500">
      <img src="https://images.unsplash.com/photo-1564622506233-4f6b46b3c58e?w=1200&h=600&fit=crop" alt="Modern Production Facility" class="absolute inset-0 w-full h-full object-cover">
      <div class="absolute inset-0 bg-black/40"></div>
      <div class="container-max text-center text-white z-10 px-4">
        <h2 class="text-4xl md:text-6xl font-bold mb-4 text-balance">State-of-the-Art Production</h2>
        <p class="text-lg md:text-xl mb-8 text-balance">Advanced machinery and skilled workforce ensuring excellence</p>
        <a href="{{ route('factory') }}" class="btn-primary inline-block">Visit Our Factory</a>
      </div>
    </div>
    <button class="slider-btn prev-btn" aria-label="Previous slide"><i class="fas fa-chevron-left"></i></button>
    <button class="slider-btn next-btn" aria-label="Next slide"><i class="fas fa-chevron-right"></i></button>
    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 z-10 flex gap-2">
      <div class="w-3 h-3 bg-white rounded-full opacity-50"></div>
      <div class="w-3 h-3 bg-white rounded-full opacity-50"></div>
      <div class="w-3 h-3 bg-white rounded-full opacity-50"></div>
    </div>
  </section>

  <!-- Global Clients Section -->
  <section class="section-padding bg-gray-50">
    <div class="container-max px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-center mb-12 gradient-text">Our Global Clients</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8">
        @foreach(['ZARA','H&M','Uniqlo','Nike','Adidas','GAP'] as $client)
        <div class="flex items-center justify-center h-20 bg-white rounded-lg card-shadow">
          <span class="text-2xl font-bold text-blue-900">{{ $client }}</span>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Featured Products Section -->
   <!-- Featured Products Section -->
<section class="section-padding">
  <div class="container-max px-4">

    <h2 class="text-3xl md:text-4xl font-bold text-center mb-4 gradient-text">
      Featured Products
    </h2>

    <p class="text-center text-gray-600 mb-12 max-w-2xl mx-auto">
      Explore our premium collection of garments manufactured with the highest quality standards
    </p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      @foreach($page->sections[2]->posts as $post)
        <div class="product-card rounded-lg overflow-hidden card-shadow bg-white">

          <img src="{{ Storage::url($post->image) }}" class="w-full h-48 object-contain bg-gray-50">

          <div class="p-6">
            <h3 class="text-xl font-bold text-blue-900 mb-2">
              {{ $post->title }}
            </h3>

            <p class="text-gray-600 text-sm mb-4">
              {!! $post->body !!}
            </p>

            <a href="{{ route('products') }}#product-{{ $post->id }}"
               class="text-blue-900 font-semibold hover:text-green-800">
              View Details →
            </a>
          </div>

        </div>
      @endforeach

    </div>

    <div class="text-center mt-12">
      <a href="{{ route('products') }}" class="btn-primary">
        Browse All Products
      </a>
    </div>

  </div>
</section>

  <!-- About Preview Section -->
@php
    $aboutSection = $page->sections->firstWhere('identifier', 'about-company');
@endphp

@if($aboutSection && $aboutSection->posts->count())
    @foreach($aboutSection->posts as $post)

        <section class="section-padding bg-gray-50">
            <div class="container-max px-4">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-stretch">

                    <!-- Image -->
                    <div>
                        <img src="{{ Storage::url($post->image) }}"
                             alt="{{ $post->title }}"
                             class="rounded-lg card-shadow w-full h-96 object-cover">
                    </div>

                    <!-- Content -->
                    <div class="flex flex-col h-full">

                        <h2 class="text-3xl md:text-4xl font-bold gradient-text mb-6">
                            {{ $post->title }}
                        </h2>

                        <p class="text-gray-600 mb-4">
                            {!! $post->body !!}
                        </p>

                        <!-- Button always at bottom -->
                        <div class="mt-auto">
                            <a href="{{ route('about') }}" class="btn-primary">
                                Learn More
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    @endforeach
@endif

  <!-- Factory Highlights Section -->


 @php
    $factorySection = $page->sections->firstWhere('identifier', 'factory-highlights');
@endphp

@if($factorySection && $factorySection->posts->count())
<section class="section-padding">
    <div class="container-max px-4">

        <h2 class="text-3xl md:text-4xl font-bold text-center gradient-text mb-12">
            Factory Highlights
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($factorySection->posts as $post)
                <div class="rounded-lg overflow-hidden card-shadow bg-white">
                    <img
                        src="{{ Storage::url($post->image) }}"
                        alt="{{ $post->title }}"
                        class="w-full h-48 object-cover"
                    >

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-blue-900 mb-2">
                            {{ $post->title }}
                        </h3>

                        <p class="text-gray-600">
                            {!! $post->body !!}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
@endif


  <!-- Certification Section -->
  <section class="section-padding">
    <div class="container-max px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-center gradient-text mb-12">International Certifications</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @php
        $certs = [
          ['icon' => '🏆', 'name' => 'ISO 9001', 'sub' => 'Quality Mgmt'],
          ['icon' => '✓', 'name' => 'BSCI', 'sub' => 'Social Audit'],
          ['icon' => '♻️', 'name' => 'WRAP', 'sub' => 'Labor Practice'],
          ['icon' => '🌿', 'name' => 'OEKO-TEX', 'sub' => 'Eco-Friendly'],
          ['icon' => '📋', 'name' => 'ISO 14001', 'sub' => 'Environment'],
        ]
        @endphp
        @foreach($certs as $cert)
        <div class="cert-badge p-6 bg-gray-50 rounded-lg text-center card-shadow">
          <div class="text-4xl mb-2">{{ $cert['icon'] }}</div>
          <p class="font-bold text-blue-900">{{ $cert['name'] }}</p>
          <p class="text-sm text-gray-600">{{ $cert['sub'] }}</p>
        </div>
        @endforeach
      </div>
      <div class="text-center mt-12">
        <a href="{{ route('certifications') }}" class="btn-primary">View All Certifications</a>
      </div>
    </div>
  </section>

  <!-- Gallery Section -->
  @php
    $gallerySection = $page->sections->firstWhere('identifier', 'gallery');
@endphp

@if($gallerySection && $gallerySection->posts->count())
<section class="section-padding bg-gray-50">
    <div class="container-max px-4">

        <h2 class="text-3xl md:text-4xl font-bold text-center gradient-text mb-12">
            Gallery
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @foreach($gallerySection->posts as $post)
                <img
                    src="{{ Storage::url($post->image) }}"
                    alt="{{ $post->title }}"
                    class="rounded-lg card-shadow w-full h-64 object-cover hover:scale-105 transition-transform duration-300"
                >
            @endforeach
        </div>

        <div class="text-center">
            <a href="{{ route('gallery') }}" class="btn-secondary">
                View Full Gallery
            </a>
        </div>

    </div>
</section>
@endif

  <!-- Contact CTA Section -->
  <section class="section-padding bg-gradient-to-r from-blue-900 to-green-800">
    <div class="container-max text-center text-white px-4">
      <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Start Your Order?</h2>
      <p class="text-lg mb-8 text-balance">Connect with our team today for customized solutions and competitive pricing</p>
      <a href="{{ route('contact') }}" class="inline-block px-12 py-4 bg-white text-blue-900 font-semibold rounded-lg hover:bg-gray-100 transition-all duration-300 shadow-lg hover:shadow-xl">
        Contact Us Now
      </a>
    </div>
  </section>

@endsection
