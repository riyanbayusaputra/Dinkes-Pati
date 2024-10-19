{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Video') }}: {{ $video->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <!-- Video Embed -->
                <div class="aspect-w-16 aspect-h-9 mb-6">
                    @if (!empty($video->youtube_url))
                        <iframe class="w-full h-full" 
                                src="https://www.youtube.com/embed/{{ basename($video->youtube_url) }}" 
                                frameborder="0" allowfullscreen></iframe>
                    @else
                        <p class="text-red-500">URL video tidak tersedia.</p>
                    @endif
                </div>

                <h3 class="text-lg font-bold">Deskripsi Video</h3>
                <p>{{ $video->description ?? 'Tidak ada deskripsi untuk video ini.' }}</p>
            </div>

            <!-- Slider untuk Video Lain -->
            <div class="mt-8 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                    {{ __('Video Lainnya') }}
                </h2>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach ($videos as $Video)
                            <div class="swiper-slide">
                                <h3 class="text-lg font-bold">{{ $Video->title }}</h3>
                                <div class="aspect-w-16 aspect-h-9">
                                    @if (!empty($Video->youtube_url))
                                        <iframe class="w-full h-full" 
                                                src="https://www.youtube.com/embed/{{ basename($Video->youtube_url) }}" 
                                                frameborder="0" allowfullscreen></iframe>
                                    @else
                                        <p class="text-red-500">URL video tidak tersedia.</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- Add Navigation -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@latest/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper@latest/swiper-bundle.min.js"></script>

    <script>
        // Initialize Swiper
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>
</x-app-layout> --}}
