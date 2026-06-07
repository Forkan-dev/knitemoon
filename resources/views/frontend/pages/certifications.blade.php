@extends('frontend.layouts.app')

@section('title', 'Certifications - TextileExport Pro')

@section('content')

  <!-- Page Header -->
  <section class="bg-gradient-to-r from-blue-900 to-green-800 text-white section-padding">
    <div class="container-max px-4">
      <h1 class="text-4xl md:text-5xl font-bold mb-4">Our Certifications</h1>
      <p class="text-lg">International Quality & Compliance Standards</p>
    </div>
  </section>

  <!-- Certifications Grid -->
  <section class="section-padding">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold text-center gradient-text mb-12">Quality & Compliance Certifications</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @php
        $certifications = [
          ['icon' => '🏆', 'name' => 'ISO 9001:2015', 'sub' => 'Quality Management System', 'border' => 'border-blue-900',
           'desc' => 'International standard for quality management systems. Ensures consistent product quality and customer satisfaction.',
           'issued' => '2015', 'valid' => '2026', 'auditor' => 'TÜV Rheinland', 'auditor_label' => 'Auditor'],
          ['icon' => '✓', 'name' => 'BSCI Certification', 'sub' => 'Business Social Compliance Initiative', 'border' => 'border-green-700',
           'desc' => 'Ensures ethical and responsible labor practices. Covers worker rights, health & safety, and environmental compliance.',
           'issued' => '2018', 'valid' => '2025', 'auditor' => 'Control Union', 'auditor_label' => 'Auditor'],
          ['icon' => '♻️', 'name' => 'WRAP Certification', 'sub' => 'Worldwide Responsible Accredited Production', 'border' => 'border-blue-900',
           'desc' => 'Certifies compliance with legal, environmental, and safety standards in manufacturing. Monitors labor practices globally.',
           'issued' => '2017', 'valid' => '2025', 'auditor' => 'WR-BD-2017-001', 'auditor_label' => 'Facility ID'],
          ['icon' => '🌿', 'name' => 'OEKO-TEX Standard 100', 'sub' => 'Eco-Friendly Textile Standard', 'border' => 'border-green-700',
           'desc' => 'Certifies that textiles are free from harmful substances and produced in environmentally responsible manner.',
           'issued' => '2019', 'valid' => '2024', 'auditor' => 'OT19.BD.00156', 'auditor_label' => 'Certificate #'],
          ['icon' => '🌍', 'name' => 'ISO 14001:2015', 'sub' => 'Environmental Management System', 'border' => 'border-blue-900',
           'desc' => 'Demonstrates commitment to environmental sustainability. Covers waste management, emissions, and resource efficiency.',
           'issued' => '2016', 'valid' => '2025', 'auditor' => 'TÜV Rheinland', 'auditor_label' => 'Auditor'],
          ['icon' => '👥', 'name' => 'SA8000 Certification', 'sub' => 'Social Accountability Standard', 'border' => 'border-green-700',
           'desc' => 'International standard for social accountability. Certifies ethical labor practices and safe working conditions.',
           'issued' => '2020', 'valid' => '2023', 'auditor' => 'DNV GL', 'auditor_label' => 'Auditor'],
        ]
        @endphp
        @foreach($certifications as $cert)
        <div class="bg-white p-8 rounded-lg card-shadow border-t-4 {{ $cert['border'] }}">
          <div class="flex items-center gap-4 mb-6">
            <div class="text-5xl">{{ $cert['icon'] }}</div>
            <div>
              <h3 class="text-2xl font-bold text-blue-900">{{ $cert['name'] }}</h3>
              <p class="text-gray-600 text-sm">{{ $cert['sub'] }}</p>
            </div>
          </div>
          <p class="text-gray-600 mb-4">{{ $cert['desc'] }}</p>
          <div class="bg-gray-50 p-4 rounded mb-4">
            <p class="text-sm text-gray-600"><strong>Issued:</strong> {{ $cert['issued'] }}</p>
            <p class="text-sm text-gray-600"><strong>Valid Until:</strong> {{ $cert['valid'] }}</p>
            <p class="text-sm text-gray-600"><strong>{{ $cert['auditor_label'] }}:</strong> {{ $cert['auditor'] }}</p>
          </div>
          <p class="text-sm text-green-700 font-semibold">✓ Certified & Verified</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Additional Compliance -->
  <section class="section-padding bg-gray-50">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold text-center gradient-text mb-12">Additional Compliance & Standards</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
        $compliance = [
          ['title' => 'Export Quality Standards', 'desc' => 'Compliant with international export requirements and regulations'],
          ['title' => 'Supplier Code of Conduct', 'desc' => 'Strict adherence to ethical sourcing and supply chain practices'],
          ['title' => 'Chemical Safety Standards', 'desc' => 'REACH, CPSIA, and other chemical safety compliance'],
          ['title' => 'Worker Health & Safety', 'desc' => 'Occupational safety standards and health regulations'],
          ['title' => 'Traceability System', 'desc' => 'Full product traceability from raw material to finished goods'],
          ['title' => 'Regular Audits', 'desc' => 'Annual third-party audits and compliance verification'],
        ]
        @endphp
        @foreach($compliance as $item)
        <div class="bg-white p-6 rounded-lg card-shadow">
          <div class="text-3xl mb-3">✓</div>
          <h3 class="font-bold text-blue-900 mb-2">{{ $item['title'] }}</h3>
          <p class="text-gray-600 text-sm">{{ $item['desc'] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Why Certs Matter -->
  <section class="section-padding">
    <div class="container-max px-4">
      <h2 class="text-3xl font-bold text-center gradient-text mb-12">Why Our Certifications Matter</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-8 rounded-lg card-shadow">
          <h3 class="text-xl font-bold text-blue-900 mb-4">🛡️ Quality Assurance</h3>
          <p class="text-gray-600">Our certifications guarantee that every product meets stringent quality standards and international regulations.</p>
        </div>
        <div class="bg-white p-8 rounded-lg card-shadow">
          <h3 class="text-xl font-bold text-blue-900 mb-4">🌱 Sustainability</h3>
          <p class="text-gray-600">We're committed to environmental responsibility and sustainable manufacturing practices at every stage.</p>
        </div>
        <div class="bg-white p-8 rounded-lg card-shadow">
          <h3 class="text-xl font-bold text-blue-900 mb-4">👥 Ethical Practices</h3>
          <p class="text-gray-600">Fair labor practices, worker safety, and ethical treatment are at the core of our operations.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="section-padding bg-gradient-to-r from-blue-900 to-green-800">
    <div class="container-max text-center text-white px-4">
      <h2 class="text-3xl md:text-4xl font-bold mb-4">Verified & Trusted Partner</h2>
      <p class="text-lg mb-8">Our multiple certifications demonstrate our commitment to quality, sustainability, and ethical practices</p>
      <a href="{{ route('contact') }}" class="inline-block px-12 py-4 bg-white text-blue-900 font-semibold rounded-lg hover:bg-gray-100 shadow-lg">Request Certification Details</a>
    </div>
  </section>

@endsection
