@extends('frontend.layouts.app')

@section('title', 'Our Factory - TextileExport Pro')

@section('content')

  <!-- Page Header -->
  <section class="bg-gradient-to-r from-blue-900 to-green-800 text-white section-padding">
    <div class="container-max px-4">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Factory</h1>
      <p class="text-lg">State-of-the-art Manufacturing Facility</p>
    </div>
  </section>

  <!-- Factory Overview -->
  <section class="section-padding">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold gradient-text mb-12">Factory Overview</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-12">
        <img src="https://images.unsplash.com/photo-1554224311-beee415c15e1?w=500&h=400&fit=crop" alt="Factory" class="rounded-lg card-shadow w-full h-96 object-cover">
        <div>
          <h3 class="text-2xl font-bold text-blue-900 mb-4">Facility Highlights</h3>
          <ul class="space-y-4">
            @php
            $highlights = [
              ['title' => '50,000+ sq meters', 'desc' => 'Modern manufacturing facility'],
              ['title' => 'Advanced Machinery', 'desc' => 'Latest CNC, digital printing, and automated systems'],
              ['title' => '500+ Skilled Workers', 'desc' => 'Well-trained and experienced team'],
              ['title' => 'Quality Control Labs', 'desc' => 'Advanced testing equipment for quality assurance'],
            ]
            @endphp
            @foreach($highlights as $h)
            <li class="flex items-start gap-3">
              <span class="text-2xl text-green-700">✓</span>
              <div>
                <p class="font-bold text-blue-900">{{ $h['title'] }}</p>
                <p class="text-gray-600">{{ $h['desc'] }}</p>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Production Process -->
  <section class="section-padding bg-gray-50">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold gradient-text mb-12">Production Process</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center mb-12">
        <div>
          <h3 class="text-2xl font-bold text-blue-900 mb-6">Advanced Production Line</h3>
          <p class="text-gray-600 mb-4">Our production line is equipped with the latest technology to ensure:</p>
          <ul class="space-y-3 mb-6">
            @foreach(['Consistent quality output','Quick turnaround time','Minimal waste production','Worker safety standards','Environmental compliance'] as $item)
            <li class="flex items-center gap-2"><i class="fas fa-check text-green-700"></i> <span>{{ $item }}</span></li>
            @endforeach
          </ul>
        </div>
        <img src="https://images.unsplash.com/photo-1565710041743-5e95400e9177?w=500&h=400&fit=crop" alt="Production" class="rounded-lg card-shadow w-full h-96 object-cover">
      </div>
    </div>
  </section>

  <!-- Machinery & Equipment -->
  <section class="section-padding">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold text-center gradient-text mb-12">Machinery & Equipment</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-lg card-shadow">
          <h3 class="text-xl font-bold text-blue-900 mb-3">Cutting & Stitching</h3>
          <p class="text-gray-600 mb-4">Automated cutting tables and industrial sewing machines with precision control</p>
          <p class="text-sm text-green-700 font-semibold">100+ machines | 24/7 operation</p>
        </div>
        <div class="bg-white p-8 rounded-lg card-shadow">
          <h3 class="text-xl font-bold text-blue-900 mb-3">Dyeing & Finishing</h3>
          <p class="text-gray-600 mb-4">State-of-the-art dyeing vats with temperature control and quality monitoring</p>
          <p class="text-sm text-green-700 font-semibold">50+ vats | 200+ colors available</p>
        </div>
        <div class="bg-white p-8 rounded-lg card-shadow">
          <h3 class="text-xl font-bold text-blue-900 mb-3">Printing & Embroidery</h3>
          <p class="text-gray-600 mb-4">Digital and screen printing with embroidery capabilities for custom designs</p>
          <p class="text-sm text-green-700 font-semibold">15+ machines | Digital & traditional</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Quality Control -->
  <section class="section-padding bg-gray-50">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold gradient-text mb-12">Quality Control System</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <img src="https://images.unsplash.com/photo-1586611338391-48e83f5e72e6?w=500&h=400&fit=crop" alt="QC" class="rounded-lg card-shadow w-full h-96 object-cover">
        <div>
          <h3 class="text-2xl font-bold text-blue-900 mb-6">Multi-Stage Quality Assurance</h3>
          <div class="space-y-4">
            @php
            $stages = [
              ['title' => 'Raw Material Inspection', 'desc' => 'Every shipment is tested before production'],
              ['title' => 'In-Process Monitoring', 'desc' => 'Quality checks at every production stage'],
              ['title' => 'Final Inspection', 'desc' => '100% final product inspection before packaging'],
              ['title' => 'Lab Testing', 'desc' => 'Advanced testing for strength, color, and durability'],
            ]
            @endphp
            @foreach($stages as $stage)
            <div class="bg-white p-4 rounded-lg border-l-4 border-blue-900">
              <p class="font-bold text-blue-900 mb-2">{{ $stage['title'] }}</p>
              <p class="text-gray-600 text-sm">{{ $stage['desc'] }}</p>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Capacity Stats -->
  <section class="section-padding">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold text-center gradient-text mb-12">Production Capacity</h2>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        @php
        $stats = [
          ['value' => '500K', 'label' => 'Units/Month'],
          ['value' => '20', 'label' => 'Production Lines'],
          ['value' => '99.8%', 'label' => 'Quality Pass Rate'],
          ['value' => '30-45', 'label' => 'Days Lead Time'],
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

  <!-- CTA -->
  <section class="section-padding bg-gradient-to-r from-blue-900 to-green-800">
    <div class="container-max text-center text-white px-4">
      <h2 class="text-3xl md:text-4xl font-bold mb-4">Want to Visit Our Factory?</h2>
      <p class="text-lg mb-8">Schedule a factory tour to see our operations firsthand</p>
      <a href="{{ route('contact') }}" class="inline-block px-12 py-4 bg-white text-blue-900 font-semibold rounded-lg hover:bg-gray-100 shadow-lg">Schedule Tour</a>
    </div>
  </section>

@endsection
