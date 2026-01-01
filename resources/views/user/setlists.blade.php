@extends('layouts.user')

@section('title', 'Setlist Performance')

@section('content')
<div class="min-h-screen bg-gray-100">
    @if(isset($setlist))
        <!-- Detail Setlist -->
        <div class="max-w-4xl mx-auto p-6">
            <a href="{{ ('setlist') }}" class="nav-link inline-block mb-4 px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-700 transition duration-300">Back to Setlists</a>
            <h1 class="text-3xl font-bold text-black mb-6">{{ $setlist->title }}</h1>
            <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                <div class="flex items-center mb-4">
                    @php
                        $imagePath = public_path('storage/foto/' . $setlist->image);
                        $timestamp = file_exists($imagePath) ? filemtime($imagePath) : time();
                    @endphp
                    <img src="{{ asset('storage/foto/' . $setlist->image) }}?v={{ $timestamp }}"
                         alt="{{ $setlist->title }}"
                         class="w-32 h-32 rounded-lg object-cover mr-6">
                    <div>
                        <h2 class="text-2xl font-bold text-red-500">{{ $setlist->title }}</h2>
                        <p class="text-lg text-gray-700">{{ $setlist->artist }}</p>
                        <p class="text-sm text-gray-500">Production Year: {{ $setlist->production_year }}</p>
                    </div>
                </div>
            </div>

            <!-- Songs List -->
            <h2 class="text-2xl font-bold text-black mb-4">Songs</h2>
            <div class="bg-white p-6 rounded-lg shadow-md">
                @foreach($setlist->songs as $song)
                    <div class="border-b border-gray-200 py-4 last:border-b-0">
                        <div class="flex justify-between items-center">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">{{ $song->title }}</h3>
                                <p class="text-sm text-gray-600">Duration: {{ $song->duration }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        @include('partials.setlists')
    @endif
</div>

<script>
    $(document).ready(function() {
        $('.nav-link').click(function(e) {
            e.preventDefault();
            var page = $(this).attr('href');

            $('#content').fadeOut(200, function() {
                $.get('/partials/' + (page === 'live' ? 'lives' : page), function(data) {
                    $('#content').html(data).fadeIn(200);
                }).fail(function() {
                    $('#content').html('<p class="text-red-500">Content not found</p>').fadeIn(200);
                });
            });
        });

        $('#dropdown-profile').click(function(event) {
            event.stopPropagation();
            $('#dropdown-menu').toggleClass('hidden');
        });

        $('#dropdown-profile-mobile').click(function(event) {
            event.stopPropagation();
            $('#dropdown-menu-mobile').toggleClass('hidden');
        });

        $(document).click(function(event) {
            if (!event.target.closest('#dropdown-profile') && !event.target.closest('#dropdown-profile-mobile')) {
                $('#dropdown-menu').addClass('hidden');
                $('#dropdown-menu-mobile').addClass('hidden');
            }
        });

        // Hamburger menu toggle
        $('#hamburger').click(function() {
            $('#mobile-menu').toggleClass('hidden');
        });
    });
</script>
@endsection
