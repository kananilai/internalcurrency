<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Thank;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MainController extends Controller
{
    public function index()
    {
        $today=Carbon::today();
        $today_thanks = Thank::whereDate('created_at', $today)->count();
        $count = Thank::count();
        if (Auth::check()){
            $items=Auth::user();
            return view('/top',['items' => $items,'today_thanks' => $today_thanks,'count'=> $count]);
        }
        else{
            return view('/top',['today_thanks'=>$today_thanks,'count'=> $count]);
        }
    }

    public function mypage()
    {
        $id=Auth::id();
        //メッセージ取得
        $items = Thank::where('to_user_id',$id)->get();

        //送ったuser_idのみ取得
        $send_name = Thank::where('to_user_id',$id)->first(['user_id']);
        //送ったuser_idと一致するユーザーをuserから探す（nameカラムのみ取り出す。）
        $send_name= User::where('id',$send_name->user_id )->first(['name']);

        return view('mypage',['items' =>$items, 'send_name'=>$send_name]);
    }

}