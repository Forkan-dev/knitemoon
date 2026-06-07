{{-- Dynamic CMS sections renderer. Pass $page (Page model with eager-loaded sections.posts) --}}
@if(isset($page) && $page->sections->isNotEmpty())
    @foreach($page->sections as $section)
        <section
            id="{{ $section->identifier }}"
            class="section-padding {{ $section->css_class }}"
            @if($section->background_color)
                style="background-color: {{ $section->background_color }}"
            @endif
        >
            <div class="container-max">
                @if($section->name || $section->description)
                    <div class="text-center mb-12">
                        @if($section->name)
                            <h2 class="text-3xl md:text-4xl font-bold gradient-text mb-4">{{ $section->name }}</h2>
                        @endif
                        @if($section->description)
                            <p class="text-gray-600 text-lg max-w-2xl mx-auto">{{ $section->description }}</p>
                        @endif
                    </div>
                @endif

                @if($section->posts->isNotEmpty())
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($section->posts as $post)
                            <div class="card-shadow bg-white rounded-xl overflow-hidden flex flex-col">
                                {{-- Media --}}
                                @if($post->image)
                                    <img
                                        src="{{ Storage::disk('public')->url($post->image) }}"
                                        alt="{{ $post->title }}"
                                        class="w-full h-48 object-cover"
                                    >
                                @elseif($post->icon)
                                    <div class="flex items-center justify-center h-20 pt-6 text-indigo-600">
                                        <i class="{{ $post->icon }} text-4xl"></i>
                                    </div>
                                @endif

                                <div class="p-6 flex flex-col flex-1">
                                    {{-- Badge --}}
                                    @if($post->badge)
                                        <span class="cert-badge inline-block mb-2">{{ $post->badge }}</span>
                                    @endif

                                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $post->title }}</h3>

                                    {{-- Excerpt or body --}}
                                    @if($post->excerpt)
                                        <p class="text-gray-600 flex-1">{{ $post->excerpt }}</p>
                                    @elseif($post->body)
                                        <div class="text-gray-600 flex-1 prose prose-sm">{!! $post->body !!}</div>
                                    @endif

                                    {{-- CTA button --}}
                                    @if($post->button_text && $post->button_url)
                                        <div class="mt-4">
                                            <a
                                                href="{{ $post->button_url }}"
                                                target="{{ $post->button_target }}"
                                                class="btn-primary inline-block"
                                            >
                                                {{ $post->button_text }}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endforeach
@endif
