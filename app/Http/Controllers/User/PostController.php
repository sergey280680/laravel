<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return 'Страница списка постов ЮЗЕРА>';
    }

    public function create()
    {
        return 'Страница создание поста';
    }

    public function store()
    {
        return 'Запрос создания постов';
    }

    public function show($post)
    {
        return "Страница Просмотра постов {$post}";
    }

    public function edit($post)
    {
        return "Страница редак ти ррование постов {$post}";
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
