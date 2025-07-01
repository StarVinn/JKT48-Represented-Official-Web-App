@extends('layouts.app')

@section('content')
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