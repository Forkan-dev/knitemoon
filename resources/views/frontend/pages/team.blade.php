@extends('frontend.layouts.app')

@section('title', 'Management Team - TextileExport Pro')

@section('content')

  <!-- Page Header -->
  <section class="bg-gradient-to-r from-blue-900 to-green-800 text-white section-padding">
    <div class="container-max px-4">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Management Team</h1>
      <p class="text-lg">Meet Our Experienced Leadership</p>
    </div>
  </section>

  <!-- Executive Team -->
  <section class="section-padding">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold text-center gradient-text mb-12">Executive Leadership</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @php
        $executives = [
          ['img' => 'photo-1507003211169-0a1dd7228f2d', 'name' => 'Ahmed Hassan', 'role' => 'Managing Director', 'bio' => '20+ years in textile industry | MBA from London Business School'],
          ['img' => 'photo-1494790108377-be9c29b29330', 'name' => 'Fatima Amin', 'role' => 'Operations Director', 'bio' => 'Quality & compliance specialist | ISO 9001 Auditor'],
          ['img' => 'photo-1507003211169-0a1dd7228f2d', 'name' => 'Mohammad Khan', 'role' => 'Production Manager', 'bio' => '15+ years production expertise | Process optimization specialist'],
          ['img' => 'photo-1438761681033-6461ffad8d80', 'name' => 'Sarah Ahmed', 'role' => 'Export Manager', 'bio' => 'Global logistics specialist | Multilingual professional'],
        ]
        @endphp
        @foreach($executives as $exec)
        <div class="team-card text-center bg-white rounded-lg overflow-hidden card-shadow">
          <img src="https://images.unsplash.com/{{ $exec['img'] }}?w=300&h=300&fit=crop" alt="{{ $exec['name'] }}" class="w-full h-56 object-cover">
          <div class="p-6">
            <h3 class="text-lg font-bold text-blue-900 mb-1">{{ $exec['name'] }}</h3>
            <p class="text-green-700 font-semibold text-sm mb-2">{{ $exec['role'] }}</p>
            <p class="text-gray-600 text-sm mb-4">{{ $exec['bio'] }}</p>
            <div class="flex justify-center gap-3">
              <a href="#" class="text-blue-900 hover:text-green-800"><i class="fab fa-linkedin"></i></a>
              <a href="#" class="text-blue-900 hover:text-green-800"><i class="fas fa-envelope"></i></a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Senior Managers -->
  <section class="section-padding bg-gray-50">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold text-center gradient-text mb-12">Senior Management</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @php
        $seniors = [
          ['img' => 'photo-1500648767791-00dcc994a43e', 'name' => 'Hassan Ali', 'role' => 'Quality Assurance Manager', 'bio' => 'Expert in quality control and testing procedures'],
          ['img' => 'photo-1507003211169-0a1dd7228f2d', 'name' => 'Rashid Hussain', 'role' => 'Purchasing Manager', 'bio' => 'Specializes in raw material sourcing and supplier management'],
          ['img' => 'photo-1494790108377-be9c29b29330', 'name' => 'Aisha Khan', 'role' => 'HR & Admin Manager', 'bio' => 'Employee welfare and compliance specialist'],
        ]
        @endphp
        @foreach($seniors as $manager)
        <div class="team-card text-center bg-white rounded-lg overflow-hidden card-shadow">
          <img src="https://images.unsplash.com/{{ $manager['img'] }}?w=300&h=300&fit=crop" alt="{{ $manager['name'] }}" class="w-full h-56 object-cover">
          <div class="p-6">
            <h3 class="text-lg font-bold text-blue-900 mb-1">{{ $manager['name'] }}</h3>
            <p class="text-green-700 font-semibold text-sm mb-2">{{ $manager['role'] }}</p>
            <p class="text-gray-600 text-sm">{{ $manager['bio'] }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Department Heads -->
  <section class="section-padding">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold text-center gradient-text mb-12">Department Heads</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @php
        $departments = [
          ['icon' => 'fa-tools', 'name' => 'Maintenance Department', 'head' => 'Mohammad Farhan | 10+ years experience', 'desc' => 'Responsible for machinery maintenance and equipment optimization'],
          ['icon' => 'fa-layer-group', 'name' => 'Packaging Department', 'head' => 'Rifat Rahman | 8+ years experience', 'desc' => 'Manages packaging, labeling, and shipment preparation'],
          ['icon' => 'fa-palette', 'name' => 'Dyeing Department', 'head' => 'Tanvir Alam | Color expert with 12+ years', 'desc' => 'Handles all dyeing, finishing, and color quality control'],
          ['icon' => 'fa-scissors', 'name' => 'Cutting Department', 'head' => 'Ibrahim Hassan | 15+ years cutting expert', 'desc' => 'Manages cutting, pattern making, and fabric utilization'],
        ]
        @endphp
        @foreach($departments as $dept)
        <div class="bg-white p-8 rounded-lg card-shadow">
          <div class="flex items-center gap-4 mb-4">
            <div class="w-16 h-16 bg-gradient-to-br from-blue-900 to-green-800 rounded-full flex items-center justify-center text-white text-2xl">
              <i class="fas {{ $dept['icon'] }}"></i>
            </div>
            <div>
              <h3 class="text-lg font-bold text-blue-900">{{ $dept['name'] }}</h3>
              <p class="text-gray-600 text-sm">Led by {{ $dept['head'] }}</p>
            </div>
          </div>
          <p class="text-gray-600 text-sm">{{ $dept['desc'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Workplace Culture -->
  <section class="section-padding bg-gray-50">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold text-center gradient-text mb-12">Our Workplace Culture</h2>
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
        @php
        $culture = [
          ['icon' => '👥', 'title' => 'Team Collaboration', 'desc' => 'We believe in teamwork and mutual respect'],
          ['icon' => '📚', 'title' => 'Continuous Learning', 'desc' => 'Regular training and skill development programs'],
          ['icon' => '🏆', 'title' => 'Excellence Focus', 'desc' => 'Commitment to quality in everything we do'],
          ['icon' => '🌱', 'title' => 'Growth Opportunity', 'desc' => 'Career advancement and leadership development'],
        ]
        @endphp
        @foreach($culture as $item)
        <div class="text-center">
          <div class="text-5xl mb-4">{{ $item['icon'] }}</div>
          <h3 class="font-bold text-blue-900 mb-2">{{ $item['title'] }}</h3>
          <p class="text-gray-600 text-sm">{{ $item['desc'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section-padding bg-gradient-to-r from-blue-900 to-green-800">
    <div class="container-max text-center text-white px-4">
      <h2 class="text-3xl md:text-4xl font-bold mb-4">Join Our Growing Team</h2>
      <p class="text-lg mb-8">We're always looking for talented individuals to join us</p>
      <a href="{{ route('contact') }}" class="inline-block px-12 py-4 bg-white text-blue-900 font-semibold rounded-lg hover:bg-gray-100 shadow-lg">Career Opportunities</a>
    </div>
  </section>

@endsection
