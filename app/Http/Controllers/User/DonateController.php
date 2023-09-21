<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Donate;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function __invoke(){
        $query = Donate::query();


//  ############ Этот способ делает 5 SQL запросов ###########3
//        $stats = [
//            'total_count' => $query->count(),
//            'total_amount' => $query->sum('amount'),
//            'avg_amount' => $query->avg('amount'),
//            'min_amount' => $query->min('amount'),
//            'max_amount' => $query->max('amount'),
//        ];
//  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

//  ############ Этот способ делает 1 SQL запрос ###############
//  ############ и создает массив с заданными ключами ############
        $statistics = $query
            ->select(['currency_id'])
            ->selectRaw('count(*) as total_count')
            ->selectRaw('sum(amount) as total_amount')
            ->selectRaw('avg(amount) as avg_amount')
            ->selectRaw('min(amount) as min_amount')
            ->selectRaw('max(amount) as max_amount')
            ->groupBy('currency_id')
            ->get();
//  ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

//        dd($statistics->toArray());

        return view('user.donates.index', compact('statistics'));
    }
}
