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

  <!-- Filter Section -->
  <section class="section-padding bg-gray-50">
    <div class="container-max px-4">
      <h2 class="text-2xl font-bold mb-6">Filter by Category</h2>
      <div class="flex flex-wrap gap-4">
        <button class="filter-btn active" onclick="filterProducts('all')">All Products</button>
        <button class="filter-btn" onclick="filterProducts('tshirts')">T-Shirts</button>
        <button class="filter-btn" onclick="filterProducts('polos')">Polo Shirts</button>
        <button class="filter-btn" onclick="filterProducts('hoodies')">Hoodies</button>
        <button class="filter-btn" onclick="filterProducts('jackets')">Jackets</button>
        <button class="filter-btn" onclick="filterProducts('denim')">Denim</button>
      </div>
    </div>
  </section>

  <!-- Products Grid -->
  <section class="section-padding">
    <div class="container-max px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @php
        $products = [
          ['img' => 'photo-1521572163474-6864f9cf17ab', 'name' => 'Premium Cotton T-Shirt', 'desc' => 'High-quality cotton jersey with comfortable fit', 'cat' => 'tshirts', 'fabric' => '100% Cotton', 'gsm' => '180 - 200', 'moq' => '500 units', 'colors' => '15+'],
          ['img' => 'photo-1586711003456-d34e30c7ce49', 'name' => 'Premium Polo Shirt', 'desc' => 'Professional pique fabric with moisture-wicking', 'cat' => 'polos', 'fabric' => '65% Poly, 35% Cotton', 'gsm' => '200 - 220', 'moq' => '300 units', 'colors' => '20+'],
          ['img' => 'photo-1556821552-7f41c5d440db', 'name' => 'Premium Fleece Hoodie', 'desc' => 'Comfortable casual wear with premium fleece', 'cat' => 'hoodies', 'fabric' => '80% Cotton, 20% Poly', 'gsm' => '300 - 350', 'moq' => '200 units', 'colors' => '12+'],
          ['img' => 'photo-1617944052062-eeb1a8bc0ffd', 'name' => 'Classic Denim Jacket', 'desc' => 'Timeless style with durable denim construction', 'cat' => 'jackets', 'fabric' => '100% Cotton Denim', 'gsm' => '400 - 450', 'moq' => '150 units', 'colors' => '8+'],
          ['img' => 'photo-1542272604-787c62d465d1', 'name' => 'Premium Denim Jeans', 'desc' => 'High-quality denim with perfect fit and durability', 'cat' => 'denim', 'fabric' => '100% Cotton Denim', 'gsm' => '350 - 400', 'moq' => '100 units', 'colors' => '5+'],
          ['img' => 'photo-1539533057440-7814a9d4aeb9', 'name' => 'Performance Sports Wear', 'desc' => 'Moisture-wicking fabric for active lifestyle', 'cat' => 'sports', 'fabric' => '88% Poly, 12% Spandex', 'gsm' => '150 - 170', 'moq' => '300 units', 'colors' => '18+'],
        ]
        @endphp
        @foreach($products as $product)
        <div id="{{ $product['cat'] }}" class="product-card rounded-lg overflow-hidden card-shadow bg-white product-item" data-category="{{ $product['cat'] }}">
          <img src="https://images.unsplash.com/{{ $product['img'] }}?w=400&h=300&fit=crop" alt="{{ $product['name'] }}" class="w-full h-48 object-cover">
          <div class="p-6">
            <h3 class="text-xl font-bold text-blue-900 mb-2">{{ $product['name'] }}</h3>
            <p class="text-gray-600 mb-4">{{ $product['desc'] }}</p>
            <div class="mb-4 space-y-1">
              <p class="text-sm"><span class="font-bold">Fabric:</span> {{ $product['fabric'] }}</p>
              <p class="text-sm"><span class="font-bold">GSM:</span> {{ $product['gsm'] }}</p>
              <p class="text-sm"><span class="font-bold">MOQ:</span> {{ $product['moq'] }}</p>
              <p class="text-sm"><span class="font-bold">Colors:</span> {{ $product['colors'] }} options</p>
            </div>
            <a href="{{ route('contact') }}?product={{ $product['cat'] }}" class="btn-primary text-sm w-full text-center block">Request Quote</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

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
