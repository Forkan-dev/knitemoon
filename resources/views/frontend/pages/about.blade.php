@extends('frontend.layouts.app')

@section('title', 'About Us - TextileExport Pro')

@section('content')

<!-- Page Header -->
@foreach($page->sections[0]->posts as $post)

<section class="bg-gradient-to-r from-blue-900 to-green-800 text-white section-padding">
  <div class="container-max px-4">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{$post->title}}</h1>
    <p class="text-lg">{!! $post->body !!}</p>
  </div>
</section>

@endforeach


<!-- Company Story -->
@foreach($page->sections[1]->posts as $post)
<section class="section-padding">
  <div class="container-max px-4 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
    <div>
      <h2 class="text-3xl font-bold gradient-text mb-6">{{$post->title}}</h2>
      <p class="text-gray-600 mb-4">{!! $post->body !!}</p>
    </div>
    <div>
      <img src="{{ asset('storage/'.$post->image) }}" alt="Factory" class="rounded-lg card-shadow w-full h-96 object-cover">
    </div>
  </div>
</section>
@endforeach


<!-- Mission & Vision -->

<section class="section-padding bg-gray-50">
  <div class="container-max px-4">
    <h2 class="text-3xl font-bold text-center gradient-text mb-12">
      {{ $page->sections[2]->name }}
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
      @foreach($page->sections[2]->posts as $post)
      <div class="bg-white p-8 rounded-lg card-shadow">
        <div class="text-4xl text-blue-900 mb-4">🎯</div>
        <h3 class="text-2xl font-bold text-blue-900 mb-4">
          {{ $post->title }}
        </h3>
        <p class="text-gray-600">
          {!! $post->body !!}
        </p>
      </div>
      @endforeach
    </div>
  </div>
</section>





<!-- Values -->
<section class="section-padding bg-gray-50">
  <div class="container-max px-4">
    <h2 class="text-3xl font-bold text-center gradient-text mb-12">{{ $page->sections[3]->name }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @foreach($page->sections[3]->posts as $post)
      <div class="bg-white p-8 rounded-lg card-shadow">
        <div class="text-4xl mb-4">✓</div>
        <h3 class="text-xl font-bold text-blue-900 mb-3">{{ $post->title }}
        </h3>
        <p class="text-gray-600"> {!! $post->body !!} </p>
      </div>
      @endforeach

    </div>
  </div>
</section>

<!-- Location -->
<section class="section-padding">
  <div class="container-max px-4">
    <h2 class="text-3xl font-bold text-center gradient-text mb-8">Our Location</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
      <div class="bg-white p-8 rounded-lg card-shadow">
        <h3 class="text-2xl font-bold text-blue-900 mb-6">Visit Our Factory</h3>
        <ul class="space-y-4">
          @foreach($page->sections[4]->posts as $post)
          

          <li class="flex items-start gap-3">
            <i class="{{$post->icon}}"></i>
            <div>
              <p class="font-bold text-blue-900">{{$post->title}}</p>
              <p class="text-gray-600">{!! $post->body !!}</p>
            </div>
          </li>   
          @endforeach    

        </ul>
        <a href="{{ route('contact') }}" class="btn-primary mt-8 inline-block">Schedule a Visit</a>
      </div>
      <div class="rounded-lg overflow-hidden card-shadow h-96 bg-gray-200 flex items-center justify-center">
        <div class="text-center">
          <i class="fas fa-map text-4xl text-gray-400 mb-4"></i>
          <p class="text-gray-500">Google Maps Integration</p>
          <p class="text-sm text-gray-400 mt-2">Dhaka, Bangladesh</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="section-padding bg-gradient-to-r from-blue-900 to-green-800">
  <div class="container-max text-center text-white px-4">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">Ready to Partner With Us?</h2>
    <p class="text-lg mb-8">Let's discuss how we can support your business needs</p>
    <a href="{{ route('contact') }}" class="inline-block px-12 py-4 bg-white text-blue-900 font-semibold rounded-lg hover:bg-gray-100 shadow-lg">Contact Us</a>
  </div>
</section>

@endsection