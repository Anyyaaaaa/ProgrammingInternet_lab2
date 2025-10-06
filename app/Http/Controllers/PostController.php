<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Беремо всі пости, сортуючи від найновіших, і додаємо пагінацію
        $posts = Post::latest()->paginate(10);

        // Передаємо пости у view (який ми створимо пізніше)
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Перевіряємо, чи є користувач адміном
        if (!auth()->user()->is_admin) {
            abort(403); // Якщо ні - показуємо помилку "Доступ заборонено"
        }

        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!auth()->user()->is_admin) {
            abort(403);
        }
        // 1. Валідація даних з форми
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'event_time' => 'required|date',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        // 2. Додаємо ID поточного авторизованого користувача
        $validated['user_id'] = auth()->id();

        // 3. Створюємо новий пост (івент) в базі даних
        Post::create($validated);

        // 4. Перенаправляємо користувача на головну сторінку з повідомленням про успіх
        return redirect()->route('posts.index')->with('success', 'Подію успішно анонсовано!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // Просто передаємо конкретний пост у view
        return view('posts.show', compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        // Цей метод ми реалізуємо пізніше
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Цей метод ми реалізуємо пізніше
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Цей метод ми реалізуємо пізніше
    }
}
