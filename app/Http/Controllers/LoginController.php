<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
//        $request->ip(); //Получаем ip-адрес пользователя.
//        $request->path(); //Получаем путь после домена.
//        $request->url(); //Получаем полный адрес но без query параметров.
//        $request->fullUrl(); //Получаем полный адрес уже с query параметрами.
//        $request->is('значение'); // Проверяет путь запроса.

        $name = $request->input('name');
        $email = $request->input('email');
//        return "запрос на вход";

        if (true) {
            return redirect()->back()->withInput();
        }
        return redirect()->route('user');
    }
}
