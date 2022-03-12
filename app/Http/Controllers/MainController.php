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
        $count = Thank::count();
        if (Auth::check()){
            $items=Auth::user();
            $today=Carbon::today();
            if(!empty(Thank::whereDate('created_at', $today)->first())){
                $today_thanks = Thank::whereDate('created_at', $today)->count();
                return view('/top',['items' => $items,'today_thanks' => $today_thanks,'count'=> $count]);
            }
            else{
                $today_thanks=0;
                return view('/top',['items' => $items,'today_thanks' => $today_thanks,'count'=> $count]);
            }

        }
        else{
            $today=Carbon::today();
            if(!empty(Thank::whereDate('created_at', $today)->first())){
            $today_thanks = Thank::whereDate('created_at', $today)->count();
            return view('/top',['today_thanks'=>$today_thanks,'count'=> $count]);
            }
            else{
                $today_thanks=0;
                return view('/top',['count'=> $count,'today_thanks'=>$today_thanks,]);
            }

        }
    }

    public function mypage()
    {
        $id=Auth::id();


        //送ったuser_idのみ取得
        if($send_name = Thank::where('to_user_id',$id)->first(['user_id'])){
            //送ったuser_idと一致するユーザーをuserから探す（nameカラムのみ取り出す。）
            $items = Thank::where('to_user_id',$id)->get();
            $send_name= User::where('id',$send_name->user_id )->first(['name']);
            return view('mypage',['items' =>$items, 'send_name'=>$send_name]);
        }else{
            $message = "メッセージはありません。。";
            return view('mypage',['message' => $message]);
        }
    }

    public function sended()
    {
        $id=Auth::id();
        if(Thank::where('user_id',$id)->first()){
            $sended = Thank::where('user_id',$id)->get();
            $send_name= User::where('id',$id)->first(['name']);
            return view('mypage',['sended' => $sended,'send_name'=>$send_name,'message'=>' ']);
        }else{
            $send_message = "メッセージを送っていません。。";
            return view('mypage',['send_message' => $send_message]);
        }
    }
}
