<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use Illuminate\Http\Request;
use Nette\Schema\ValidationException;

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

    public function store(Request $request)
    {
//        $title = $request->input('title');
//        $content = $request->input('content');

//        $validated = $request->validated();

//        $validated = $request->validate([
//            'title' =>['required', 'string', 'max:100'],
//            'content' =>['required', 'string', 'max:10000']
//        ]);

//        $validated = validator($request->all(), [
//            'title' =>['required', 'string', 'max:100'],
//            'content' =>['required', 'string', 'max:10000']
//        ])->validate();

//        if (true) {
//            throw ValidationException::withMessages([
//               'account' => __('Недостаточно средств')
//            ]);
//        }

        $validated = validate($request->all(), [
            'title' =>['required', 'string', 'max:100'],
            'content' =>['required', 'string', 'max:10000']
        ]);

        dd($validated);


        alert(__('Сохранено'));

        return redirect()->route('user.posts.show', 123);
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

    public function update(Request $request, $post)
    {
        alert(__('Обновлено'));
        return redirect()->back();

    }

    public function delete($posts)
    {
        return redirect()->route('user.posts');
    }

    public function like()
    {
        return 'Лайк + 1';
    }

}
