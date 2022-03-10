@extends('layouts.app')

@section('content')

<form action='/send' method="POST">
    @csrf
    <div class="point">
        <p>MyPoint：{{ $items->point }}</p>
    </div>
    <table class="send_table">
        <tr>
            <td>
                <label for="to_user_id">送り先</label>
            </td>
            <td  align="left">
                <select name="to_user_id">
                    @foreach($users as $user)
                    @if($user->id == $items->id)
                    @continue
                    @endif
                    <option value="{{ $user->id }}">{{ $user->name }}さん</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="message">メッセージ</label>
            </td>
            <td>
                <textarea id="message" name="message" required></textarea>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="hidden" name="loginUserId" value="{{ $items->id }}">
                <input class="button" type="submit" value="送信！!">
            </td>
        </tr>
    </table>
</form>
@endsection
