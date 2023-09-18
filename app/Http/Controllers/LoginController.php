<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
//        Получаем данные из сессии
//        $fooo = session()->get('kuz');

//        Проверяет есть ли данные с таким ключом
//        session()->has('kuz')
//        dd(session()->all());

        return view('login.index');
    }

    public function store(Request $request)
    {
//        Добавляем данные в сессию
//        session()->put('foo', 'bar'); session(['kuz' => 'baz']); // Две анологичные функции

//        session()->forget('foo');  // Удаление данных 'foo' из сессии
//        session()->flush();        // Удаление всех данных из сессии

        alert(__('Добро пожаловать в Laravel'));

//        if (true) {
//            return redirect()->back()->withInput();
//        }
        return redirect()->route('user');
    }
}
