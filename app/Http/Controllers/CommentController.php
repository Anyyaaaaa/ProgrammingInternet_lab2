<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Збереження нового коментаря в базі даних.
     */
    public function store(Request $request, Event $post)
    {
        // Валідація: перевіряємо, що текст коментаря не порожній
        $request->validate([
            'body' => 'required|string',
        ]);

        // Створюємо коментар, автоматично прив'язуючи його до поста ($post)
        // і до поточного користувача (auth()->id())
        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);

        // Повертаємо користувача на ту ж сторінку, з якої він відправив коментар
        return back()->with('success', 'Коментар успішно додано!');
    }
}
