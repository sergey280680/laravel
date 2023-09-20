<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $category_id = $request->input('category_id');

        $post = (object)[
            'id' => 123,
            'title' => 'Title text',
            'content' => 'If you want to <strong>generate</strong> a specific number of words',
            'category_id' => 1,
        ];

        $posts = array_fill(0, 10, $post);

        $posts =array_filter($posts, function ($post) use ($search, $category_id) {
            if($search && ! str_contains(strtolower($post->title), strtolower($search))) {
                return false;
            }

            if($category_id && $post->category_id != $category_id) {
                return false;
            }

            return  true;
        });


        $categories = [
            null => __('Все категории'),
            1 => __('Первая категория'),
            2 => __('Вторая категория'),
            ];

        // Select * from posts
        $posts = Post::all();
        // Select * from posts
        $posts = Post::query()->get();

        // Select 'id', 'title', 'published_at' from posts
        $posts = Post::all(['id', 'title', 'published_at']);
        // Select 'id', 'title', 'published_at' from posts
        $posts = Post::query()->get(['id', 'title', 'published_at']);

        // Select * from posts выводит 12 постов
        $posts = Post::query()->limit(12)->get();

        // Select * from posts выводит 12 постов но пропускает первые 10
        $posts = Post::query()->limit(12)->offset(10)->get();

// ############## Пагинация кастом ################################
//        Пагинация
//        $validated = $request->validate([
//           'limit' => ['nullable', 'integer', 'min:1', 'max:100'],
//           'page' => ['nullable', 'integer', 'min:1', 'max:100'],
//        ]);
//
//        $page = $validated['page'] ?? 1;
//        $limit = $validated['limit'] ?? 4;
//        $offset = $limit * ($page - 1);
//
//        $posts = Post::query()->limit($limit)->offset($offset)->get();
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

// ###################################################################
//        Пагинация Laravel
//        $posts = Post::query()->paginate(6);
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

// ###################################################################
//        Пагинация Laravel c сортировкой
        // сортировка показывает сначала старые
//        $posts = Post::query()->orderBy('published_at', 'asc')->paginate(6);
//        $posts = Post::query()->oldest('published_at')->paginate(6);
        // сортировка показывает сначала новые
//        $posts = Post::query()->orderBy('published_at', 'desc')->paginate(6);
//        $posts = Post::query()->latest('published_at')->paginate(6);
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

// ############## Сортировка по нескольким полям ####################
        $posts = Post::query()
            ->latest('published_at')
            ->oldest('id')
            ->paginate(6);
// ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

        return view('blog.index', compact('posts', 'categories'));
    }

    public function show($post)
    {
        $post = (object)[
            'id' => 123,
            'title' => 'Title text',
            'content' => 'If you want to <strong>generate</strong> a specific number of words',
        ];

        $posts = array_fill(0, 10, $post);

        return view('blog.show', compact('post'));

    }

    public function like($post)
    {
        return "Поставить Лайк (like - $post)";
    }

}
