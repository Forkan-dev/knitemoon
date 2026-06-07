<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ isset($page) && $page->title ? $page->title : '' }}@yield('title', 'TextileExport Pro - Premium Garments Manufacturing')</title>
  <meta name="description" content="{{ isset($page) && $page->meta_description ? $page->meta_description : '' }}@yield('meta_description', 'Leading textile and garments manufacturer with ISO, BSCI, WRAP, and OEKO-TEX certifications. Export quality products worldwide.')">
  @if(isset($page) && $page->og_image)<meta property="og:image" content="{{ Storage::disk('public')->url($page->og_image) }}">@endif
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    * {
      transition-property: colors, background-color, border-color;
      transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
      transition-duration: 300ms;
    }
    html { scroll-behavior: smooth; }
    body { font-family: 'Inter', system-ui, sans-serif; background-color: white; color: #111827; }
    h1, h2, h3, h4, h5, h6 { font-family: 'Poppins', system-ui, sans-serif; font-weight: bold; }

    .btn-primary {
      padding: 0.75rem 2rem;
      background-color: #001f3f;
      color: white;
      font-weight: 600;
      border-radius: 0.5rem;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      transition: all 300ms;
    }
    .btn-primary:hover { background-color: #0d4d2e; box-shadow: 0 10px 15px rgba(0,0,0,0.15); }

    .btn-secondary {
      padding: 0.75rem 2rem;
      background-color: white;
      color: #001f3f;
      font-weight: 600;
      border-radius: 0.5rem;
      border: 2px solid #001f3f;
      transition: all 300ms;
    }
    .btn-secondary:hover { background-color: #f3f4f6; }

    .card-shadow { box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    .card-shadow:hover { box-shadow: 0 20px 25px rgba(0,0,0,0.15); }

    .gradient-text {
      background: linear-gradient(135deg, #001f3f 0%, #0d4d2e 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .section-padding { padding: 4rem 1rem; }
    @media (min-width: 768px) { .section-padding { padding: 5rem 2rem; } }

    .container-max { max-width: 80rem; margin-left: auto; margin-right: auto; }

    nav { position: sticky; top: 0; z-index: 50; background-color: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }

    .product-card { transition: transform 300ms; border-radius: 0.5rem; overflow: hidden; background-color: white; }
    .product-card:hover { transform: translateY(-8px); }

    .team-card { transition: all 300ms; border-radius: 0.5rem; overflow: hidden; background-color: white; }
    .team-card:hover { transform: translateY(-8px); box-shadow: 0 25px 50px rgba(0,0,0,0.15); }

    .cert-badge { transition: transform 300ms; }
    .cert-badge:hover { transform: scale(1.1); }

    .gallery-img { border-radius: 0.5rem; box-shadow: 0 4px 6px rgba(0,0,0,0.1); width: 100%; height: 16rem; object-fit: cover; cursor: pointer; transition: transform 300ms; }
    .gallery-img:hover { transform: scale(1.05); box-shadow: 0 20px 25px rgba(0,0,0,0.15); }

    .filter-btn { padding: 0.5rem 1rem; background-color: #f3f4f6; color: #001f3f; border: 2px solid transparent; border-radius: 9999px; font-weight: 500; cursor: pointer; transition: all 300ms; }
    .filter-btn:hover, .filter-btn.active { background-color: #001f3f; color: white; border-color: #0d4d2e; }

    .slide { transition: opacity 500ms; }
    .slide.hidden { display: none; }

    .slider-btn {
      position: absolute; top: 50%; transform: translateY(-50%); z-index: 20;
      background-color: rgba(0,31,63,0.8); color: white; width: 3rem; height: 3rem;
      display: flex; align-items: center; justify-content: center;
      border-radius: 9999px; border: none; cursor: pointer; transition: all 300ms; font-size: 1.5rem;
    }
    .slider-btn:hover { background-color: #0d4d2e; }
    .slider-btn.prev-btn { left: 1rem; }
    .slider-btn.next-btn { right: 1rem; }
    @media (min-width: 768px) { .slider-btn.prev-btn { left: 2rem; } .slider-btn.next-btn { right: 2rem; } }

    .light-gray { background-color: #f5f5f5; }
    .text-balance { text-wrap: balance; }

    @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .animate-fade-in { animation: fadeIn 0.6s ease-out; }
    [data-animate] { opacity: 0; animation: fadeIn 0.6s ease-out forwards; }
  </style>
  @stack('styles')
</head>
<body>

  <!-- Navigation -->
  <nav class="border-b border-gray-200">
    <div class="container-max flex items-center justify-between py-4 px-4">
      <a href="{{ route('home') }}" class="flex items-center gap-2">
        <div class="w-10 h-10 bg-gradient-to-br from-blue-900 to-green-800 rounded-lg flex items-center justify-center">
          <span class="text-white font-bold text-lg">TE</span>
        </div>
        <span class="text-xl font-bold text-blue-900">TextileExport Pro</span>
      </a>

      <!-- Desktop Menu -->
      <div class="hidden md:flex gap-8">
        <a href="{{ route('home') }}" class="font-medium hover:text-blue-900 {{ request()->routeIs('home') ? 'text-blue-900 font-bold' : '' }}">Home</a>
        <a href="{{ route('products') }}" class="font-medium hover:text-blue-900 {{ request()->routeIs('products') ? 'text-blue-900 font-bold' : '' }}">Products</a>
        <a href="{{ route('about') }}" class="font-medium hover:text-blue-900 {{ request()->routeIs('about') ? 'text-blue-900 font-bold' : '' }}">About</a>
        <a href="{{ route('factory') }}" class="font-medium hover:text-blue-900 {{ request()->routeIs('factory') ? 'text-blue-900 font-bold' : '' }}">Factory</a>
        <a href="{{ route('team') }}" class="font-medium hover:text-blue-900 {{ request()->routeIs('team') ? 'text-blue-900 font-bold' : '' }}">Team</a>
        <a href="{{ route('gallery') }}" class="font-medium hover:text-blue-900 {{ request()->routeIs('gallery') ? 'text-blue-900 font-bold' : '' }}">Gallery</a>
        <a href="{{ route('certifications') }}" class="font-medium hover:text-blue-900 {{ request()->routeIs('certifications') ? 'text-blue-900 font-bold' : '' }}">Certifications</a>
      </div>

      <a href="{{ route('contact') }}" class="hidden md:block btn-primary text-sm">Contact Us</a>

      <button id="mobile-menu-btn" class="md:hidden text-blue-900 text-2xl">
        <i class="fas fa-bars"></i>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-gray-50 border-t">
      <div class="flex flex-col gap-4 p-4">
        <a href="{{ route('home') }}" class="font-medium {{ request()->routeIs('home') ? 'text-blue-900 font-bold' : '' }}">Home</a>
        <a href="{{ route('products') }}" class="font-medium {{ request()->routeIs('products') ? 'text-blue-900 font-bold' : '' }}">Products</a>
        <a href="{{ route('about') }}" class="font-medium {{ request()->routeIs('about') ? 'text-blue-900 font-bold' : '' }}">About</a>
        <a href="{{ route('factory') }}" class="font-medium {{ request()->routeIs('factory') ? 'text-blue-900 font-bold' : '' }}">Factory</a>
        <a href="{{ route('team') }}" class="font-medium {{ request()->routeIs('team') ? 'text-blue-900 font-bold' : '' }}">Team</a>
        <a href="{{ route('gallery') }}" class="font-medium {{ request()->routeIs('gallery') ? 'text-blue-900 font-bold' : '' }}">Gallery</a>
        <a href="{{ route('certifications') }}" class="font-medium {{ request()->routeIs('certifications') ? 'text-blue-900 font-bold' : '' }}">Certifications</a>
        <a href="{{ route('contact') }}" class="btn-primary text-center">Contact Us</a>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  @yield('content')

  <!-- Footer -->
  <footer class="bg-blue-900 text-white py-12">
    <div class="container-max grid grid-cols-1 md:grid-cols-4 gap-8 mb-8 px-4">
      <div>
        <h3 class="text-lg font-bold mb-4">TextileExport Pro</h3>
        <p class="text-gray-300 text-sm mb-4">Leading textile manufacturer with global reach and premium quality.</p>
        <div class="flex gap-4">
          <a href="#" class="text-gray-300 hover:text-white transition-colors"><i class="fab fa-facebook"></i></a>
          <a href="#" class="text-gray-300 hover:text-white transition-colors"><i class="fab fa-twitter"></i></a>
          <a href="#" class="text-gray-300 hover:text-white transition-colors"><i class="fab fa-linkedin"></i></a>
          <a href="#" class="text-gray-300 hover:text-white transition-colors"><i class="fab fa-instagram"></i></a>
        </div>
      </div>
      <div>
        <h4 class="font-bold mb-4">Quick Links</h4>
        <ul class="space-y-2 text-gray-300 text-sm">
          <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
          <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">About Us</a></li>
          <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">Products</a></li>
          <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">Contact</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-bold mb-4">Products</h4>
        <ul class="space-y-2 text-gray-300 text-sm">
          <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">T-Shirts</a></li>
          <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">Polo Shirts</a></li>
          <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">Hoodies</a></li>
          <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">Denim</a></li>
        </ul>
      </div>
      <div>
        <h4 class="font-bold mb-4">Contact Info</h4>
        <ul class="space-y-2 text-gray-300 text-sm">
          <li class="flex items-center gap-2"><i class="fas fa-map-marker-alt"></i> Dhaka, Bangladesh</li>
          <li class="flex items-center gap-2"><i class="fas fa-phone"></i> +880 1234-567890</li>
          <li class="flex items-center gap-2"><i class="fas fa-envelope"></i> info@textileexport.com</li>
          <li class="flex items-center gap-2"><i class="fab fa-whatsapp"></i> +880 1234-567890</li>
        </ul>
      </div>
    </div>
    <div class="border-t border-blue-800 pt-8 px-4">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm text-gray-300 container-max">
        <p>© {{ date('Y') }} TextileExport Pro. All rights reserved.</p>
        <div class="flex justify-center gap-6">
          <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
          <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
        </div>
        <p class="text-right">Certified & Trusted Manufacturer</p>
      </div>
    </div>
  </footer>

  <script src="{{ asset('js/site/app.js') }}"></script>
  @stack('scripts')

  <script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    });
  </script>
</body>
</html>
