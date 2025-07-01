@extends('layouts.user')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard</title>
    <!-- CSS -->
    <style>
    * { box-sizing: border-box; }
    body { margin: 0; font-family: sans-serif; }

    .slider-wrapper {
      overflow: hidden; /* Hide scrollbar */
    }

    .slider-container {
      display: flex;
      gap: 2rem;
      padding: 2rem 0;
      scroll-snap-type: x mandatory;
      overflow-x: scroll;
      scroll-behavior: smooth;
      -ms-overflow-style: none; /* IE and Edge */
      scrollbar-width: none; /* Firefox */
    }

    .slider-container::-webkit-scrollbar {
      display: none; /* Chrome, Safari */
    }

    .slide {
      flex: 0 0 auto;
      width: 80vw;
      max-width: 600px;
      aspect-ratio: 16 / 9;
      scroll-snap-align: center;
      position: relative;
      border-radius: 16px;
      overflow: hidden;
    }

    .slide img {
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

    .content {
      text-align: center;
      padding: 2rem;
    }
  </style>

</head>
<body>
    @section('content')

    <br><br>
    <h1 class="text-3xl font-bold">User Dashboard</h1>
    <p>Selamat datang, {{ Auth::user()->name }}!</p>

    <div class="slider-container" id="slider">
    <div class="slide"><img src="{{ asset('background.jpg') }}" alt="1"></div>
    <div class="slide"><img src="{{ asset('background2.jpg') }}" alt="2"></div>
    <div class="slide"><img src="{{ asset('background3.jpg') }}" alt="3"></div>
  </div>

  <div class="pagination" id="pagination">
    <button data-index="0" class="active"></button>
    <button data-index="1"></button>
    <button data-index="2"></button>
  </div>

  <script>
    const slider = document.getElementById('slider');
    const buttons = document.querySelectorAll('.pagination button');
    const slides = document.querySelectorAll('.slide');
    let currentIndex = 0;

    function scrollToSlide(index) {
      const target = slides[index];
      if (target) {
        target.scrollIntoView({ behavior: 'smooth', inline: 'center' });
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
    </script>

    <div class="container mx-auto px-4 py-6">
      <h1 class="text-3xl font-bold mb-6 border-b pb-2">Berita JKT48</h1>
  
      <div class="space-y-6">
          @foreach ($newsList as $news)
          <div class="flex gap-4 items-start border-b pb-4">
              <div>
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
                  <div class="w-20 h-6 rounded text-white text-xs text-center {{ $catMap[$news['category']] ?? 'bg-black' }}">
                      {{ $news['category'] }}
                  </div>
              </div>
              <div>
                  <h3 class="text-xl font-semibold text-blue-700 hover:underline">
                    <a href="https://jkt48.com/news/list?lang=id">
                          {{ $news['title'] }}
                      </a>
                  </h3>
                  <p class="text-sm text-gray-600 mt-1">{{ $news['date'] }}</p>
              </div>
          </div>
          @endforeach
      </div>
  </div>
@endsection

</body>
</html>

