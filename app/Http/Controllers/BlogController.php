<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return "Посты в блоге (index)";
    }

    public function show($post)
    {
        return "Один пост в блоге (show - $post)";
    }

    public function like($post)
    {
        return "Поставить Лайк (like - $post)";
    }

}
