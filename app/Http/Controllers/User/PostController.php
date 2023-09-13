<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
//        dd(23);
        $post = (object)[
            'id' => 123,
            'title' => 'Title text',
            'content' => 'If you want to <strong>generate</strong> a specific number of words',
        ];

        $posts = array_fill(0, 10, $post);

        return view('user.posts.index', compact('posts'));
    }

    public function create()
    {
//        dd('create');
        return view('user.posts.create') ;
    }

    public function store()
    {
//        dd('store');
        return 'Запрос на создание поста';
    }

    public function show($post)
    {
        $post = (object)[
            'id' => 123,
            'title' => 'Title text',
            'content' => 'If you want to <strong>generate</strong> a specific number of words',
        ];

        $posts = array_fill(0, 10, $post);

        return view('user.posts.show', compact('post'));
    }

    public function edit($post)
    {
        $post = (object)[
            'id' => 123,
            'title' => 'Title text',
            'content' => 'If you want to <strong>generate</strong> a specific number of words',
        ];

//        $posts = array_fill(0, 10, $post);

        return view('user.posts.edit', compact('post'));
    }

    public function update()
    {
        return 'Страница обновления постов';
    }

    public function delete()
    {
        return 'Страница удаления постов';
    }

    public function like()
    {
        return 'Лайк + 1';
    }

}
