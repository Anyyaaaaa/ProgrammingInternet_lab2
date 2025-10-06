<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Майбутні події') }}
            </h2>
            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        Анонсувати подію
                    </a>
                @endif
            @endauth
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Повідомлення про успішне створення --}}
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="space-y-4">
                        @forelse($posts as $post)
                            <a href="{{ route('posts.show', $post) }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                                <div class="flex justify-between items-baseline">
                                    <h5 class="font-bold text-lg mb-1">{{ $post->title }}</h5>
                                    <small class="text-sm text-gray-500">{{ $post->event_time->format('d.m.Y H:i') }}</small>
                                </div>
                                <p class="mb-1 text-gray-700"><strong>Місце:</strong> {{ $post->location }}</p>
                                <small class="text-sm text-gray-600">
                                    <strong>Організатор:</strong> {{ $post->user->name }} | <strong>Категорія:</strong> {{ $post->category->name }} | ❤️ {{ $post->likes->count() }}
                                </small>
                            </a>
                        @empty
                            <p>Ще немає жодної анонсованої події.</p>
                        @endforelse
                    </div>

                    {{-- Пагінація --}}
                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
