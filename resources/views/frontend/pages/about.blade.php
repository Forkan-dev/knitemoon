@extends('frontend.layouts.app')

@section('title', 'About Us - TextileExport Pro')

@section('content')

  <!-- Page Header -->
  <section class="bg-gradient-to-r from-blue-900 to-green-800 text-white section-padding">
    <div class="container-max px-4">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">About Our Company</h1>
      <p class="text-lg">20+ Years of Excellence in Textile Manufacturing</p>
    </div>
  </section>

  <!-- Company Story -->
  <section class="section-padding">
    <div class="container-max px-4 grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
      <div>
        <h2 class="text-3xl font-bold gradient-text mb-6">Our Journey</h2>
        <p class="text-gray-600 mb-4">Founded in 2004, TextileExport Pro began with a vision to become a leading textile manufacturer with global reach. What started as a small operation has grown into a state-of-the-art facility serving 500+ clients across 50+ countries.</p>
        <p class="text-gray-600 mb-4">Our commitment to quality, innovation, and customer satisfaction has earned us numerous international certifications and the trust of global brands.</p>
        <p class="text-gray-600">We continue to invest in modern technology and skilled workforce to maintain our position as an industry leader.</p>
      </div>
      <div>
        <img src="https://images.unsplash.com/photo-1554224311-beee415c15e1?w=500&h=400&fit=crop" alt="Factory" class="rounded-lg card-shadow w-full h-96 object-cover">
      </div>
    </div>
  </section>

  <!-- Mission & Vision -->
  <section class="section-padding bg-gray-50">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold text-center gradient-text mb-12">Mission & Vision</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-lg card-shadow">
          <div class="text-4xl text-blue-900 mb-4">🎯</div>
          <h3 class="text-2xl font-bold text-blue-900 mb-4">Our Mission</h3>
          <p class="text-gray-600">To manufacture premium quality garments that meet international standards while maintaining sustainable practices and supporting our workforce with fair wages and safe working conditions.</p>
        </div>
        <div class="bg-white p-8 rounded-lg card-shadow">
          <div class="text-4xl text-green-700 mb-4">🔮</div>
          <h3 class="text-2xl font-bold text-blue-900 mb-4">Our Vision</h3>
          <p class="text-gray-600">To be the most trusted and innovative textile manufacturer in Asia, recognized for delivering exceptional quality, reliability, and environmental responsibility to our global partners.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Key Stats -->
  <section class="section-padding">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold text-center gradient-text mb-12">By The Numbers</h2>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        @php
        $stats = [
          ['value' => '20+', 'label' => 'Years Experience'],
          ['value' => '50+', 'label' => 'Countries Served'],
          ['value' => '500+', 'label' => 'Global Clients'],
          ['value' => '500K', 'label' => 'Monthly Units'],
        ]
        @endphp
        @foreach($stats as $stat)
        <div class="text-center bg-white p-8 rounded-lg card-shadow">
          <p class="text-5xl font-bold text-blue-900 mb-2">{{ $stat['value'] }}</p>
          <p class="text-gray-600 font-semibold">{{ $stat['label'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Values -->
  <section class="section-padding bg-gray-50">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold text-center gradient-text mb-12">Our Core Values</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-lg card-shadow">
          <div class="text-4xl mb-4">✓</div>
          <h3 class="text-xl font-bold text-blue-900 mb-3">Quality Excellence</h3>
          <p class="text-gray-600">We never compromise on quality. Every product undergoes rigorous testing to ensure it meets international standards.</p>
        </div>
        <div class="bg-white p-8 rounded-lg card-shadow">
          <div class="text-4xl mb-4">🌍</div>
          <h3 class="text-xl font-bold text-blue-900 mb-3">Sustainability</h3>
          <p class="text-gray-600">Environmental responsibility is at the heart of our operations, from sustainable materials to waste management.</p>
        </div>
        <div class="bg-white p-8 rounded-lg card-shadow">
          <div class="text-4xl mb-4">👥</div>
          <h3 class="text-xl font-bold text-blue-900 mb-3">Fair Practices</h3>
          <p class="text-gray-600">We believe in fair wages, safe working conditions, and respect for our employees and partners.</p>
        </div>
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
            <li class="flex items-start gap-3">
              <i class="fas fa-map-marker-alt text-green-700 mt-1"></i>
              <div><p class="font-bold text-blue-900">Address</p><p class="text-gray-600">Savar, Dhaka 1340, Bangladesh</p></div>
            </li>
            <li class="flex items-start gap-3">
              <i class="fas fa-phone text-green-700 mt-1"></i>
              <div><p class="font-bold text-blue-900">Phone</p><p class="text-gray-600">+880 1234-567890</p></div>
            </li>
            <li class="flex items-start gap-3">
              <i class="fas fa-envelope text-green-700 mt-1"></i>
              <div><p class="font-bold text-blue-900">Email</p><p class="text-gray-600">info@textileexport.com</p></div>
            </li>
            <li class="flex items-start gap-3">
              <i class="fab fa-whatsapp text-green-700 mt-1"></i>
              <div><p class="font-bold text-blue-900">WhatsApp</p><p class="text-gray-600">+880 1234-567890</p></div>
            </li>
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
