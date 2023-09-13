<?php

namespace App\Http\Controllers;

use Faker\Provider\Lorem;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $post = (object)[
            'id' => 123,
            'title' => 'Title text',
            'content' => 'If you want to <strong>generate</strong> a specific number of words',
        ];

        $posts = array_fill(0, 10, $post);

        return view('blog.index', compact('posts'));
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
