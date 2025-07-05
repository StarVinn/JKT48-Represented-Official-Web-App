@extends('layouts.user')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <style>
    * { box-sizing: border-box; }
    body { margin: 0; font-family: sans-serif; }

    .slider-wrapper {
      overflow: hidden;
    }

    .slider-container {
      display: flex;
      gap: 2rem;
      padding: 2rem 0;
      scroll-snap-type: x mandatory;
      overflow-x: scroll;
      scroll-behavior: smooth;
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    .slider-container::-webkit-scrollbar {
      display: none;
    }

    .slide {
      flex: 0 0 auto;
      width: 80vw;
      max-width: 600px;
      aspect-ratio: 16 / 9;
      scroll-snap-align: center;
      border-radius: 16px;
      overflow: hidden;
    }

    .slide img, .slide iframe {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    .pagination {
      text-align: center;
      margin-top: 1rem;
    }

    .pagination button {
      width: 12px;
      height: 12px;
      margin: 0 6px;
      background-color: #ccc;
      border: none;
      border-radius: 999px;
      cursor: pointer;
      transition: background 0.3s;
    }

    .pagination button.active {
      background-color: #555;
    }
  </style>
</head>
<body>

  <br><br>
  <h1 class="text-3xl font-bold text-center">Welcome Back.. {{ Auth::user()->name }}</h1>

  <!-- === SLIDER GAMBAR === -->
  <div class="slider-container" id="imageSlider">
    <div class="slide"><img src="{{ asset('background.jpg') }}" alt="1"></div>
    <div class="slide"><img src="{{ asset('background2.jpg') }}" alt="2"></div>
    <div class="slide"><img src="{{ asset('background3.jpg') }}" alt="3"></div>
  </div>
  <div class="pagination" id="imagePagination">
    <button data-index="0" class="active"></button>
    <button data-index="1"></button>
    <button data-index="2"></button>
  </div>

  <!-- === BERITA === -->
  <div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 border-b pb-2">Berita JKT48</h1>

    <div class="space-y-6">
      @foreach ($newsList as $news)
      <div class="flex gap-4 items-start border-b pb-4">
        @php
          $catMap = [
            'Theater' => 'bg-red-600',
            'Event' => 'bg-blue-600',
            'Release' => 'bg-green-600',
            'Birthday' => 'bg-purple-600',
            'Other' => 'bg-gray-500',
            'Unknown' => 'bg-black',
          ];
        @endphp
        <div>
          <div class="w-20 h-6 rounded text-white text-xs text-center {{ $catMap[$news['category']] ?? 'bg-black' }}">
            {{ $news['category'] }}
          </div>
        </div>
        <div>
          <h3 class="text-xl font-semibold text-blue-700 hover:underline">
            <a href="https://jkt48.com/news/list?lang=id">{{ $news['title'] }}</a>
          </h3>
          <p class="text-sm text-gray-600 mt-1">{{ $news['date'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <!-- === BIRTHDAY === -->
  <div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl text-center font-bold mb-6 border-b pb-2">Next Birthday Members JKT48 🎊🎊🎂🎂</h1>

    @if(isset($nextBirthdays) && $nextBirthdays->count() > 0)
      <div class="flex justify-center gap-12 bg-white py-8 px-4">
        @foreach($nextBirthdays as $member)
          <div class="flex flex-col items-center bg-pink-100 p-4 text-center max-w-[180px]">
            <img src="{{ asset('storage/foto/' . $member->foto) }}" alt="{{ $member->name }}" class="rounded-lg w-40 h-52 object-cover mb-2">
            @if ($member->role == 'anggota')
              <div class="text-pink-600 font-semibold text-sm">[JKT48]</div>
            @else
              <div class="text-pink-600 font-semibold text-sm">[{{ ucfirst($member->role) }}]</div>
            @endif
            <div class="text-pink-700 font-bold">{{ $member->name }}</div>
            <div class="text-pink-700">{{ \Carbon\Carbon::parse($member->tanggal_lahir)->translatedFormat('d F Y') }}</div>
          </div>
        @endforeach
      </div>
    @else
      <p class="text-center">No upcoming birthdays found.</p>
    @endif
  </div>

  <!-- === SLIDER VIDEO YOUTUBE === -->
  <div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl text-center font-bold mb-6 border-b pb-2">Video</h1>
    <div class="slider-container flex gap-4 overflow-x-auto" id="videoSlider">
      @php
        $videos = [
          [
            'id' => 'V5t-MdoYhJM',
            'title' => 'GO AND FIGHT! - JKT48 Special Performance Video',
            'duration' => '3:39',
          ],
          [
            'id' => '-yAnHwpAIMs',
            'title' => 'Raja Hati - JKT48 Special Performance Video ',
            'duration' => '4:18',
          ],
          [
            'id' => 'Bhj2zOsoTOw',
            'title' => 'Raja Hati - JKT48 Special Perfomance Video Teaser',
            'duration' => '0:19',
          ],
          [
            'id' => 'kDZNdxJ3Las',
            'title' => '[MV] Waktunya Membuktikan - JKT48 X Musikal Keluarga Cemara',
            'duration' => '3:59',
          ],
          [
            'id' => '_Qn9B9mD2bI',
            'title' => '[MV] Bibir yang Telah Dicuri - JKT48',
            'duration' => '4:22',
          ],
          [
            'id' => 'kvhNCk257WY',
            'title' => '[MV] #KuSangatSuka - JKT48',
            'duration' => '6:03',
          ],
        ];
      @endphp
    
      @foreach($videos as $video)
        <div class="slide relative group w-[80vw] max-w-[600px] aspect-video bg-black rounded-lg overflow-hidden">
          <a href="https://www.youtube.com/watch?v={{ $video['id'] }}" target="_blank" class="block w-full h-full">
            <img
              src="https://img.youtube.com/vi/{{ $video['id'] }}/hqdefault.jpg"
              class="w-full h-full object-cover"
              alt="Thumbnail"
            />
            <!-- Tombol Play -->
            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-50 text-white text-4xl group-hover:scale-110 transition">
              ▶
            </div>
          </a>
    
          <!-- Judul dan Durasi -->
          <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black via-transparent to-transparent px-4 py-2 text-white text-sm">
            <div class="font-bold truncate">{{ $video['title'] }}</div>
            <div class="text-xs">{{ $video['duration'] }}</div>
          </div>
        </div>
      @endforeach
    </div>
    
    
    
    <div class="pagination" id="videoPagination">
      <button data-index="0" class="active"></button>
      <button data-index="1"></button>
      <button data-index="2"></button>
      <button data-index="3"></button>
      <button data-index="4"></button>
    </div>
  </div>

  <!-- === JAVASCRIPT SLIDER LOGIC === -->
  <script>
    function setupSlider(sliderId, paginationId) {
      const slider = document.getElementById(sliderId);
      const buttons = document.querySelectorAll(`#${paginationId} button`);
      const slides = slider.querySelectorAll('.slide');
      let currentIndex = 0;

      function scrollToSlide(index) {
        const target = slides[index];
        if (target) {
          slider.scrollTo({
            left: target.offsetLeft - slider.offsetLeft,
            behavior: 'smooth'
          });
          buttons.forEach(btn => btn.classList.remove('active'));
          buttons[index].classList.add('active');
          currentIndex = index;
        }
      }

      buttons.forEach(button => {
        button.addEventListener('click', () => {
          scrollToSlide(Number(button.dataset.index));
        });
      });

      // Auto scroll every 5 seconds
      setInterval(() => {
        let nextIndex = (currentIndex + 1) % slides.length;
        scrollToSlide(nextIndex);
      }, 5000);
    }

    // Setup both sliders
    setupSlider('imageSlider', 'imagePagination');
    setupSlider('videoSlider', 'videoPagination');

    function playVideo(videoId, index) {
      const slide = document.querySelector(`.slide[data-index="${index}"]`);
      slide.innerHTML = `
        <iframe
          width="100%"
          height="100%"
          src="https://www.youtube.com/embed/${videoId}?autoplay=1"
          title="YouTube video"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen
          class="w-full h-full"
        ></iframe>
      `;
    }
  </script>
</body>
</html>
@endsection
