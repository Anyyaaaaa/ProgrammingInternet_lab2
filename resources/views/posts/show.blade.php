<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6 pb-4 border-b">
                        <p class="text-gray-600 text-sm">
                            <strong>Категорія:</strong> {{ $post->category->name }} |
                            <strong>Організатор:</strong> {{ $post->user->name }}
                        </p>
                        <p class="text-gray-800 mt-2"><strong>Коли:</strong> {{ $post->event_time->format('d F Y в H:i') }}</p>
                        <p class="text-gray-800"><strong>Де:</strong> {{ $post->location }}</p>
                        <div class="mt-4 text-lg">
                            {!! nl2br(e($post->content)) !!}
                        </div>
                    </div>
                    <h3 class="font-semibold text-lg mb-4">Коментарі ({{ $post->comments->count() }})</h3>
                    @auth
                        <div class="mb-6">
                            <form action="{{ route('posts.comments.store', $post) }}" method="POST">
                                @csrf
                                <textarea name="body" rows="3" class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Ваш коментар..."></textarea>
                                <button type="submit" class="mt-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                                    Додати коментар
                                </button>
                            </form>
                        </div>
                    @endauth
                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            @auth
                                <form action="{{ route('posts.like', $post) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-2xl focus:outline-none transition-transform duration-150 ease-in-out hover:scale-125">
                                        @if(auth()->user()->likes->contains($post))
                                            <span>❤️</span>
                                        @else
                                            <span>🤍</span>
                                        @endif
                                    </button>
                                </form>
                            @endauth
                            <span class="text-gray-600 font-semibold pt-1">
            {{ $post->likes->count() }}
        </span>
                        </div>
                        @auth
                            @if(auth()->user()->is_admin)
                                <div class="flex items-center space-x-4">
                                    <a href="{{ route('posts.edit', $post) }}" class="text-2xl transition-transform duration-150 ease-in-out hover:scale-125" title="Редагувати">✏️</a>
                                    <form action="{{ route('posts.destroy', $post) }}" method="POST" onsubmit="return confirm('Ви впевнені, що хочете видалити цю подію?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-2xl transition-transform duration-150 ease-in-out hover:scale-125" title="Видалити">🗑️</button>
                                    </form>
                                </div>
                            @endif
                        @endauth
                    </div>

                    <div class="space-y-4">
                        @forelse ($post->comments as $comment)
                            <div class="p-4 bg-gray-50 rounded-lg">
                                <div class="flex justify-between items-baseline">
                                    <p class="font-semibold">{{ $comment->user->name }}</p>
                                    <small class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="text-gray-700 mt-1">{{ $comment->body }}</p>
                            </div>
                        @empty
                            <p>Ще немає коментарів. Будьте першим!</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
