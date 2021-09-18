<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function store(Request $request, Administrator $administrator)//用意されているリクエストインスタンスの使用、eventインスタンスの使用
    {
        $input = $request['administrators'];//変数nputにリクエストインスタンスのevens配列を代入
        $administrator->fill($input)->save();//イベントモデルに変数inputの値を入れる
        return redirect('/events/' . $administrator->id);
}
