@extends('frontend.layouts.app')

@section('title', 'Gallery - TextileExport Pro')

@section('content')

  <!-- Page Header -->
  <section class="bg-gradient-to-r from-blue-900 to-green-800 text-white section-padding">
    <div class="container-max px-4">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Gallery</h1>
      <p class="text-lg">Explore our factory, operations, and team</p>
    </div>
  </section>

  <!-- Filter Section -->
  <section class="section-padding bg-gray-50">
    <div class="container-max px-4">
      <h2 class="text-2xl font-bold mb-6">Filter by Category</h2>
      <div class="flex flex-wrap gap-4">
        <button class="filter-btn active px-6 py-2 rounded-full font-semibold transition-all border-2" onclick="filterGallery('all')">All</button>
        <button class="filter-btn px-6 py-2 rounded-full font-semibold transition-all border-2" onclick="filterGallery('factory')">Factory</button>
        <button class="filter-btn px-6 py-2 rounded-full font-semibold transition-all border-2" onclick="filterGallery('production')">Production</button>
        <button class="filter-btn px-6 py-2 rounded-full font-semibold transition-all border-2" onclick="filterGallery('team')">Team</button>
        <button class="filter-btn px-6 py-2 rounded-full font-semibold transition-all border-2" onclick="filterGallery('events')">Events</button>
      </div>
    </div>
  </section>

  <!-- Gallery Grid -->
  <section class="section-padding">
    <div class="container-max px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $images = [
          ['photo' => 'photo-1554224311-beee415c15e1', 'alt' => 'Factory Overview', 'cat' => 'factory'],
          ['photo' => 'photo-1552664730-d307ca884978', 'alt' => 'Factory Interior', 'cat' => 'factory'],
          ['photo' => 'photo-1581092918056-0c4c3acd3789', 'alt' => 'Warehouse', 'cat' => 'factory'],
          ['photo' => 'photo-1565710041743-5e95400e9177', 'alt' => 'Production Line', 'cat' => 'production'],
          ['photo' => 'photo-1586611338391-48e83f5e72e6', 'alt' => 'Quality Control', 'cat' => 'production'],
          ['photo' => 'photo-1556821552-7f41c5d440db', 'alt' => 'Sewing', 'cat' => 'production'],
          ['photo' => 'photo-1552664730-d307ca884978', 'alt' => 'Team Work', 'cat' => 'team'],
          ['photo' => 'photo-1552664730-d307ca884978', 'alt' => 'Team Meeting', 'cat' => 'team'],
          ['photo' => 'photo-1521572163474-6864f9cf17ab', 'alt' => 'Team Photo', 'cat' => 'team'],
          ['photo' => 'photo-1552664730-d307ca884978', 'alt' => 'Event', 'cat' => 'events'],
          ['photo' => 'photo-1552664730-d307ca884978', 'alt' => 'Conference', 'cat' => 'events'],
          ['photo' => 'photo-1552664730-d307ca884978', 'alt' => 'Celebration', 'cat' => 'events'],
        ]
        @endphp
        @foreach($images as $image)
        <img src="https://images.unsplash.com/{{ $image['photo'] }}?w=400&h=300&fit=crop"
             alt="{{ $image['alt'] }}"
             class="gallery-img gallery-item"
             data-category="{{ $image['cat'] }}">
        @endforeach
      </div>
    </div>
  </section>

@endsection

@push('scripts')
<script>
function filterGallery(category) {
  const items = document.querySelectorAll('.gallery-item');
  const buttons = document.querySelectorAll('.filter-btn');
  buttons.forEach(btn => btn.classList.remove('active'));
  event.target.classList.add('active');
  items.forEach(item => {
    item.style.display = (category === 'all' || item.dataset.category === category) ? 'block' : 'none';
  });
}
</script>
@endpush
