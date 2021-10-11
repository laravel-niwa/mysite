<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
    public function show(User $user)
    {

        return $user;
    }
    public function store(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return $user->all();
    }

    public function update(Request $request, user $user)
    {
        $user->update($request->all());

        return $user;
    }
    public function destroy(User $user)
    {
        $user->delete();

        return $user;
    }


    public function show_count(Request $request)
    {
        $page = $request->input('page');
        $count = $request->input('count');

        $year_month = $request->input('year_month');


        if (!empty($page)  || !empty($count)) {

            //pageが1であれば開始位置はそのまま１ 
            //１以上であれば3*30-30=60のように開始位置を計算して取得する
            if ($page == 1) {
                $start = $page - 1;
            } elseif ($page > 1) {
                $start = $page * $count - $count;
            } else {
                return;
            }

            $list_id = DB::table('users')
                ->offset($start)
                ->limit($count)
                ->get();

            //DBのレコードの総数を取得
            $total_record_count =  DB::table('users')->count();

            $pagenation = [
                "page" => (int)$page,
                "count" => (int)$count,
                "total" =>  $total_record_count
            ];

            //apiの出力データを作成DBから取得したデータを代入
            $api_all = [
                "list" => $list_id,
                "pagenation" => $pagenation
            ];
            return response()->json($api_all);
        } elseif (!empty($year_month)) {
            //月初月末
            $first_date = date('Y-m-d', strtotime('first day of ' . $year_month));
            $last_date = date('Y-m-d', strtotime('last day of ' . $year_month));


            //入力された値の月初月末で取得
            $get_year_month = DB::table('users')
                ->whereBetween('created_at', [$first_date, $last_date])
                ->get();

            return response()->json($get_year_month);
        } else {
            //例外処理　空のjsonを返す

            return response()->json();
        }
    }
}
