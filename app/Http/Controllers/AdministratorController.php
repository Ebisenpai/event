<?php

namespace App\Http\Controllers;

use App\Administrator;
use Illuminate\Http\Request;

class AdministratorController extends Controller
{
    public function store(Request $request, Administrator $administrator)//用意されているリクエストインスタンスの使用、eventインスタンスの使用
    {
        dd("$request");
        $input = $request['user_id'];
        dd("$input");
        $input = $request['event_id'];//変数nputにリクエストインスタンスのevens配列を代入
        dd("$input");
        $administrator->fill($input)->save();//イベントモデルに変数inputの値を入れる
        return redirect('/events/' . $event->id);
    }
}
