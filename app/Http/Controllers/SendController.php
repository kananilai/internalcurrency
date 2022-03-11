<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Thank;
use Illuminate\Support\Facades\Auth;

class SendController extends Controller
{
    public function index()
    {
        $users = User::get();
        $items=Auth::user();
        return view('send',['users' => $users,'items'=>$items]);
    }
    public function send(Request $request)
    {
        Thank::create([
            'user_id' => $request['loginUserId'],
            'message' => $request['message'],
            'to_user_id' => $request['to_user_id'],
        ]);
        $sendUser = User::where('id',$request['loginUserId'])->first();
        $point = ($sendUser->point) -5;
        User::where('id',$request['loginUserId'])->update([
            'point' => $point
        ]);
        $getUser = User::where('id',$request['to_user_id'])->first();
        $point = ($getUser->point) +5;
        User::where('id',$request['to_user_id'])->update([
            'point' => $point
        ]);
        return redirect('/top');
    }
}
