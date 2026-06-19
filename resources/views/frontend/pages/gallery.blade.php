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


  <!-- Gallery Grid -->
 <section class="section-padding">
  <div class="container-max px-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

      @foreach($page->sections as $section)
        @foreach($section->posts as $post)

          <div class="gallery-item-wrapper">

            <img src="{{ asset('storage/'.$post->image) }}"
                 alt="{{ $post->title }}"
                 class="gallery-img gallery-item w-full rounded-lg">

            <h3 class="mt-3 text-lg font-semibold text-gray-800">
              {{ $post->title }}
            </h3>

          </div>

        @endforeach
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
