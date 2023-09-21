<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Donate;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'max:50', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:7', 'max:50', 'confirmed'],
            'agreement' => ['accepted'],
        ]);

//#######################################################
//        Первый способ записи данных в БД
//        $user = new User;
//        $user->name = $validated['name'];
//        $user->email = $validated['email'];
//        $user->password = bcrypt( $validated['password']);
//        $user->save();
//########################################################

//#######################################################
//        Второй способ записи данных в БД
//              Рекомендуемый
//        $user = User::query()->create([
//           'name' => $validated['name'],
//           'email' => $validated['email'],
//           'password' => bcrypt($validated['password']),
//        ]);
//########################################################

//        $currencies = Currency::query()->get();
//
////        dd($currencies);
////        dd($currencies->random()->id);
//
//        for ($i =0; $i < 10000; $i++){
//            Donate::query()->forceCreate([
//                'created_at' => now()->subDays(rand(0, 1000)),
//                'currency_id' => $currencies->random()->id,
//                'amount' => rand(1, 1000)
//            ]);
//        }
//
//
//        dd('Ok');

        return redirect()->route('user');
    }
}
