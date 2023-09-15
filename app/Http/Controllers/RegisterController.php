<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $request->has('name'); // Проверяет есть ли такой параметр в запросе и возвращает true or false
        $request->filled('name'); // Проверяет заполнен ли параметр или нет и возвращает true or false

        $name = $request->input('name');
        $email = $request->input('email');
        $agreement = $request->boolean('agreement'); // Приводит параметр 'remember' к булевому значению true or false
        $avatar = $request->file('avatar');  // Получаем файлы загруженные в форме


//        dd($name, $email, $agreement, $avatar);
        return "запрос на регистрацию";
    }
}
