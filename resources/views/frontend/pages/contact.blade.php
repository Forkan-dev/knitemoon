@extends('frontend.layouts.app')

@section('title', 'Contact Us - TextileExport Pro')

@push('styles')
<style>
  input,
  textarea,
  select {
    transition: all 300ms;
    border: 1px solid #d1d5db;
    padding: 0.75rem;
    border-radius: 0.375rem;
    font-family: inherit;
  }

  input:focus,
  textarea:focus,
  select:focus {
    outline: none;
    box-shadow: 0 0 0 2px #001f3f;
  }
</style>
@endpush

@section('content')

<!-- Page Header -->
<section class="bg-gradient-to-r from-blue-900 to-green-800 text-white section-padding">
  <div class="container-max px-4">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Us</h1>
    <p class="text-lg">Get in touch with our team to discuss your requirements</p>
  </div>
</section>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 text-center">
  {{ session('success') }}
</div>
@endif

<!-- Contact Section -->
<section class="section-padding">
  <div class="container-max px-4">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

      <!-- Contact Information -->
      <div>
        <h2 class="text-2xl font-bold gradient-text mb-8">Contact Information</h2>

        @foreach($page->sections[0]->posts as $post)
        <div class="mb-8">
          <div class="flex items-start gap-4 mb-6">
            <div class="w-12 h-12 bg-blue-900 rounded-lg flex items-center justify-center text-white text-xl flex-shrink-0">
              <i class="{{$post->icon}}"></i>
            </div>
            <div>
              <h3 class="">{{$post->title}}</h3>
              <p class="text-gray-600">{!! $post->body !!}</p>
            </div>
          </div>
        </div>
        
        @endforeach


        <div class="bg-gray-50 p-6 rounded-lg">
          <h3 class="font-bold text-blue-900 mb-4">Working Hours</h3>
          <ul class="space-y-2 text-gray-600 text-sm">
            <li><span class="font-semibold">Monday - Friday:</span> 8:00 AM - 6:00 PM</li>
            <li><span class="font-semibold">Saturday:</span> 9:00 AM - 2:00 PM</li>
            <li><span class="font-semibold">Sunday:</span> Closed</li>
          </ul>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="lg:col-span-2">
        <h2 class="text-2xl font-bold gradient-text mb-8">Send Us a Message</h2>
        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
          @csrf
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-semibold text-blue-900 mb-2">Name *</label>
              <input type="text" name="name" required value="{{ old('name') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" placeholder="Your name">
              @error('name')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="block text-sm font-semibold text-blue-900 mb-2">Email *</label>
              <input type="email" name="email" required value="{{ old('email') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" placeholder="your@email.com">
              @error('email')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label class="block text-sm font-semibold text-blue-900 mb-2">Phone *</label>
              <input type="tel" name="phone" required value="{{ old('phone') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" placeholder="+880 1234-567890">
              @error('phone')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
            </div>
            <div>
              <label class="block text-sm font-semibold text-blue-900 mb-2">Company Name</label>
              <input type="text" name="company" value="{{ old('company') }}" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" placeholder="Your company">
            </div>
          </div>
          <div>
            <label class="block text-sm font-semibold text-blue-900 mb-2">Subject *</label>
            <select name="subject" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900">
              <option value="">Select a subject</option>
              <option value="product-inquiry" {{ old('subject') == 'product-inquiry' ? 'selected' : '' }}>Product Inquiry</option>
              <option value="quotation" {{ old('subject') == 'quotation' ? 'selected' : '' }}>Request Quotation</option>
              <option value="order" {{ old('subject') == 'order' ? 'selected' : '' }}>Place an Order</option>
              <option value="sample" {{ old('subject') == 'sample' ? 'selected' : '' }}>Request Sample</option>
              <option value="complaint" {{ old('subject') == 'complaint' ? 'selected' : '' }}>Complaint</option>
              <option value="partnership" {{ old('subject') == 'partnership' ? 'selected' : '' }}>Partnership</option>
              <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
            @error('subject')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
          </div>
          <div>
            <label class="block text-sm font-semibold text-blue-900 mb-2">Message *</label>
            <textarea name="message" rows="6" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-900" placeholder="Tell us more about your inquiry...">{{ old('message') }}</textarea>
            @error('message')<p class="text-red-600 text-xs mt-1">{{ $message }}</p>@enderror
          </div>
          <button type="submit" class="btn-primary w-full">Send Message</button>
          <p class="text-sm text-gray-600 text-center">We'll get back to you within 24 hours</p>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- How We Can Help -->
<section class="section-padding bg-gray-50">
  <div class="container-max px-4">
    <h2 class="text-3xl font-bold text-center gradient-text mb-12">How We Can Help</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white p-8 rounded-lg card-shadow text-center">
        <div class="text-5xl mb-4">📋</div>
        <h3 class="font-bold text-blue-900 mb-2">Product Inquiries</h3>
        <p class="text-gray-600 text-sm">Get detailed information about our products, specifications, and customization options</p>
      </div>
      <div class="bg-white p-8 rounded-lg card-shadow text-center">
        <div class="text-5xl mb-4">💰</div>
        <h3 class="font-bold text-blue-900 mb-2">Bulk Orders</h3>
        <p class="text-gray-600 text-sm">Competitive pricing for large orders with flexible payment terms</p>
      </div>
      <div class="bg-white p-8 rounded-lg card-shadow text-center">
        <div class="text-5xl mb-4">🎨</div>
        <h3 class="font-bold text-blue-900 mb-2">Custom Solutions</h3>
        <p class="text-gray-600 text-sm">Design and produce custom garments tailored to your specifications</p>
      </div>
    </div>
  </div>
</section>

<!-- Quick Contact Buttons -->
<section class="section-padding">
  <div class="container-max text-center px-4">
    <h2 class="text-3xl font-bold gradient-text mb-8">Quick Contact</h2>
    <div class="flex flex-wrap gap-4 justify-center">
      <a href="tel:+880123456789" class="px-8 py-3 bg-blue-900 text-white font-semibold rounded-lg hover:bg-green-800 inline-flex items-center gap-2">
        <i class="fas fa-phone"></i> Call Us
      </a>
      <a href="https://wa.me/8801234567890" target="_blank" class="px-8 py-3 bg-green-700 text-white font-semibold rounded-lg hover:bg-green-800 inline-flex items-center gap-2">
        <i class="fab fa-whatsapp"></i> WhatsApp
      </a>
      <a href="mailto:info@textileexport.com" class="px-8 py-3 bg-blue-900 text-white font-semibold rounded-lg hover:bg-green-800 inline-flex items-center gap-2">
        <i class="fas fa-envelope"></i> Email
      </a>
    </div>
  </div>
</section>

@endsection