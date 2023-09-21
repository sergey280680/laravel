<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Faker\Provider\Lorem;
//use Illuminate\Database\Query\Builder;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
//use PhpParser\Builder;
use function Laravel\Prompts\search;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'search' => ['nullable', 'string', 'max:50'],
            'from_date' => ['nullable', 'string', 'date'],
            'to_date' => ['nullable', 'string', 'date', 'after:from_date'],
            'tag' => ['nullable', 'string', 'max:10'],
        ]);

        $query = Post::query()
            ->where('published', true)
            ->whereNotNull('published_at');

        if ($search = $validated['search'] ?? null) {
            $query->where('title', 'like', "%{$search}%");
        }

        if ($fromDate = $validated['from_date'] ?? null) {
            $query->where('published_at', '>=', new Carbon($fromDate));
        }

        if ($toDate = $validated['to_date'] ?? null) {
            $query->where('published_at', '<=', new Carbon($toDate));
        }

        if ($tag = $validated['tag'] ?? null) {
            $query->whereJsonContains('tags', $tag);
        }

        $posts = $query->latest('published_at')->paginate(3);

        return view('blog.index', compact('posts'));
    }

    //###############  Получаем одну запись из БД первый способ ############################

//    public function show(Request $request,Post $post)
//    {
//        return view('blog.show', compact('post'));
//    }

    //###############  Получаем одну запись из БД второй способ ############################

//    public function show(Request $request, $post)
//    {
//###############  Получаем одну запись из БД  ############################
//        Select * from posts order by published_at ask limit 1
//        $post = Post::query()->oldest('published_at')->first(['id', 'title']);
//        Select * from posts order by published_at ask limit 1 or Error
//        $post = Post::query()->oldest('published_at')->firstOrFail(['id', 'title']);
//
//        Select id, title, content from posts where id = 123 limit 1
//        $post = Post::query()->find($post, ['id', 'title', 'content']);
//        $post = Post::query()->findOrFail($post, ['id', 'title', 'content']);
//
//        Select id, title, content from posts where id in (1,2,3,5)
//        $post = Post::query()->find([1,2,3,5], ['id', 'title', 'published_at']);
//^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
//        return view('blog.show', compact('post'));
//    }

    //###############  Получаем одну запись из БД третий способ ############################

    //##############################  работа через кэш ############################
    public function show(Request $request,Post $post)
    {
        $post = cache()->remember(
            key: "posts.{$post}",
            ttl: now()->addHour(),
            callback: function () use ($post) {
            return Post::query()->findOrFail($post);
        });

        return view('blog.show', compact('post'));
    }

    public function like($post)
    {
        return "Поставить Лайк (like - $post)";
    }

}
