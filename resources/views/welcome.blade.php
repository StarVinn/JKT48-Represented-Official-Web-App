<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            margin: 0;
            overflow: hidden;
        }

        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            z-index: -1;
            opacity: 1;
            transition: opacity 2s ease-in-out;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const images = [
                'background14.jpg',
                'background13.jpg',
                'background12.jpg',
                'background11.jpg',
                'background10.jpg',
                'background9.jpg',
                'background8.jpg',
            ];
            let index = 0;
            const fadeDuration = 2000;

            // Buat elemen gambar latar belakang
            const backgroundImage = document.createElement('div');
            backgroundImage.classList.add('background-image');
            document.body.appendChild(backgroundImage);

            function preloadImage(src, callback) {
                const img = new Image();
                img.onload = callback;
                img.src = src;
            }

            function updateBackground() {
                const nextImage = images[index];
                preloadImage(nextImage, () => {
                    backgroundImage.style.backgroundImage = `linear-gradient(rgba(220, 38, 38, 0.5), rgba(220, 38, 38, 0.5)), url('${nextImage}')`;
                    backgroundImage.style.opacity = 1; // Tampilkan gambar baru
                });
            }

            function changeBackground() {
                backgroundImage.style.opacity = 0; // Mulai fade out
                index = (index + 1) % images.length;

                setTimeout(updateBackground, fadeDuration);
            }

            // Tampilkan gambar pertama
            updateBackground();
            
            // Interval untuk pergantian gambar
            setInterval(changeBackground, fadeDuration * 2 + 1000);
        });
    </script>

</head>
<body class="min-h-screen flex flex-col items-center justify-center text-white bg-red-700 bg-opacity-70">
    <header class="absolute top-4 left-4 flex items-center space-x-3">
        <img src="{{ url('logo.jpg') }}" alt="JKT48 Logo" class="w-8 h-12 sm:w-12 sm:h-16">
        <h1 class="text-lg sm:text-xl font-bold">JKT48 Fanmade Website</h1>
    </header>
    
    <div class="text-center p-4 sm:p-8 bg-white bg-opacity-20 backdrop-blur-none rounded-2xl shadow-lg max-w-xs sm:max-w-lg">
        <h1 class="text-2xl sm:text-4xl font-bold text-white drop-shadow-lg">Welcome to JKT48 Fanmade Website</h1>
        <p class="mt-2 sm:mt-4 text-base sm:text-lg text-white opacity-90">Dukung dengan hati, nikmati setiap momen, dan biarkan semangat mereka menginspirasi langkahmu.</p>
        
        <div class="mt-6 flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4 justify-center">
            <a href="{{ route('register') }}" class="bg-white text-red-600 font-bold py-2 px-6 rounded-lg shadow-lg hover:bg-gray-100 transition text-center">Get Started</a>
            <a href="{{ ('explore') }}" class="bg-red-600 text-white font-bold py-2 px-6 rounded-lg shadow-lg hover:bg-red-700 transition text-center">Explore</a>
        </div>
    </div>
</body>
</html>
