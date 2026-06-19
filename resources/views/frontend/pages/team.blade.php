@extends('frontend.layouts.app')

@section('title', 'Management Team - TextileExport Pro')

@section('content')





<!-- Chairman -->
<!-- Chairman Section -->
@foreach($page->sections as $section)

@foreach($section->posts as $post)

<section class="section-padding bg-white relative overflow-hidden">

  <!-- Background decoration -->
  <div class="absolute -top-24 -right-24 w-72 h-72 bg-green-100 rounded-full opacity-50 blur-3xl"></div>
  <div class="absolute -bottom-24 -left-24 w-72 h-72 bg-blue-100 rounded-full opacity-50 blur-3xl"></div>

  <div class="container-max px-4 relative z-10">

    <!-- Header -->
    <div class="text-center mb-12">
      <span class="inline-block px-4 py-1 rounded-full bg-blue-50 text-blue-900 text-sm font-semibold tracking-wide uppercase mb-4">
        Leadership
      </span>

      <h2 class="text-3xl md:text-4xl font-bold gradient-text">
        Message from the Chairman
      </h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 items-center">

      <!-- Image -->
      <div class="lg:col-span-2 flex justify-center">
        <div class="relative">
          <div class="absolute -inset-4 bg-gradient-to-br from-blue-900 to-green-800 rounded-2xl rotate-3"></div>

          <img src="{{ asset('storage/'.$post->image) }}"
            alt="{{ $post->title }}"
            class="relative rounded-2xl w-full max-w-sm h-[28rem] object-cover card-shadow">
        </div>
      </div>

      <!-- Content -->
      <div class="lg:col-span-3">

        <i class="fas fa-quote-left text-5xl text-green-700 opacity-30 mb-4"></i>

        
  
        <p class="text-gray-700 text-lg leading-relaxed mb-6">
          {!! ($post->body) !!}
        </p>

        @if($post->button_url)
        <a href="{{ $post->button_url }}"
          target="{{ $post->button_target ?? '_blank' }}"
          class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-blue-900 text-white hover:bg-blue-800 transition">

          <i class="{{ $post->icon ?? 'fab fa-linkedin-in' }}"></i>

        </a>
        @endif

      </div>

    </div>

  </div>
</section>

@endforeach

@endforeach


<!-- Executive Team -->
<section class="section-padding bg-gray-50">
  <div class="container-max px-4">
    <div class="text-center mb-12">
      <span class="inline-block px-4 py-1 rounded-full bg-green-50 text-green-800 text-sm font-semibold tracking-wide uppercase mb-4">Executives</span>
      <h2 class="text-3xl md:text-4xl font-bold gradient-text">Executive Leadership</h2>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
      @php
      $executives = [
      ['img' => 'photo-1507003211169-0a1dd7228f2d', 'name' => 'Ahmed Hassan', 'role' => 'Managing Director', 'bio' => '20+ years in textile industry | MBA from London Business School'],
      ['img' => 'photo-1494790108377-be9c29b29330', 'name' => 'Fatima Amin', 'role' => 'Operations Director', 'bio' => 'Quality & compliance specialist | ISO 9001 Auditor'],
      ['img' => 'photo-1507003211169-0a1dd7228f2d', 'name' => 'Mohammad Khan', 'role' => 'Production Manager', 'bio' => '15+ years production expertise | Process optimization specialist'],
      ['img' => 'photo-1438761681033-6461ffad8d80', 'name' => 'Sarah Ahmed', 'role' => 'Export Manager', 'bio' => 'Global logistics specialist | Multilingual professional'],
      ]
      @endphp
      @foreach($executives as $exec)
      <div class="team-card bg-white rounded-xl overflow-hidden card-shadow">
        <div class="relative group">
          <img src="https://images.unsplash.com/{{ $exec['img'] }}?w=400&h=400&fit=crop" alt="{{ $exec['name'] }}" class="w-full h-64 object-cover">
          <!-- Hover social overlay -->
          <div class="absolute inset-0 bg-gradient-to-t from-blue-900/80 to-transparent opacity-0 group-hover:opacity-100 transition flex items-end justify-center pb-5 gap-3">
            <a href="#" class="w-9 h-9 rounded-full bg-white text-blue-900 flex items-center justify-center hover:bg-green-700 hover:text-white transition"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="w-9 h-9 rounded-full bg-white text-blue-900 flex items-center justify-center hover:bg-green-700 hover:text-white transition"><i class="fas fa-envelope"></i></a>
          </div>
        </div>
        <div class="p-6 text-center">
          <h3 class="text-lg font-bold text-blue-900 mb-1">{{ $exec['name'] }}</h3>
          <p class="text-green-700 font-semibold text-sm mb-3">{{ $exec['role'] }}</p>
          <p class="text-gray-600 text-sm">{{ $exec['bio'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Senior Managers -->
<section class="section-padding">
  <div class="container-max px-4">
    <div class="text-center mb-12">
      <span class="inline-block px-4 py-1 rounded-full bg-blue-50 text-blue-900 text-sm font-semibold tracking-wide uppercase mb-4">Management</span>
      <h2 class="text-3xl md:text-4xl font-bold gradient-text">Senior Management</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @php
      $seniors = [
      ['img' => 'photo-1500648767791-00dcc994a43e', 'name' => 'Hassan Ali', 'role' => 'Quality Assurance Manager', 'bio' => 'Expert in quality control and testing procedures'],
      ['img' => 'photo-1507003211169-0a1dd7228f2d', 'name' => 'Rashid Hussain', 'role' => 'Purchasing Manager', 'bio' => 'Specializes in raw material sourcing and supplier management'],
      ['img' => 'photo-1494790108377-be9c29b29330', 'name' => 'Aisha Khan', 'role' => 'HR & Admin Manager', 'bio' => 'Employee welfare and compliance specialist'],
      ]
      @endphp
      @foreach($seniors as $manager)
      <div class="team-card bg-white rounded-xl card-shadow p-6 flex items-center gap-5">
        <img src="https://images.unsplash.com/{{ $manager['img'] }}?w=200&h=200&fit=crop" alt="{{ $manager['name'] }}" class="w-24 h-24 rounded-full object-cover ring-4 ring-green-100 flex-shrink-0">
        <div>
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
<section class="section-padding bg-gray-50">
  <div class="container-max px-4">
    <div class="text-center mb-12">
      <span class="inline-block px-4 py-1 rounded-full bg-green-50 text-green-800 text-sm font-semibold tracking-wide uppercase mb-4">Departments</span>
      <h2 class="text-3xl md:text-4xl font-bold gradient-text">Department Heads</h2>
    </div>
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
      <div class="bg-white p-8 rounded-xl card-shadow border-l-4 border-green-700">
        <div class="flex items-center gap-4 mb-4">
          <div class="w-16 h-16 bg-gradient-to-br from-blue-900 to-green-800 rounded-2xl flex items-center justify-center text-white text-2xl flex-shrink-0">
            <i class="fas {{ $dept['icon'] }}"></i>
          </div>
          <div>
            <h3 class="text-lg font-bold text-blue-900">{{ $dept['name'] }}</h3>
            <p class="text-gray-500 text-sm">Led by {{ $dept['head'] }}</p>
          </div>
        </div>
        <p class="text-gray-600 text-sm">{{ $dept['desc'] }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- CTA -->
<section class="section-padding bg-gradient-to-r from-blue-900 to-green-800">
  <div class="container-max text-center text-white px-4">
    <h2 class="text-3xl md:text-4xl font-bold mb-4">Want to Work With Our Team?</h2>
    <p class="text-lg text-blue-100 mb-8 max-w-2xl mx-auto">From leadership to the factory floor, our people are ready to bring your garment vision to life.</p>
    <a href="{{ route('contact') }}" class="inline-block px-12 py-4 bg-white text-blue-900 font-semibold rounded-lg hover:bg-gray-100 shadow-lg">Get in Touch</a>
  </div>
</section>

@endsection