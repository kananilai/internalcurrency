@extends('layouts.app')

@section('content')
<div class="login_user">
    @if(isset($items))
    <p>📛 {{ $items->name }}さん</p>
    @endif
</div>

<div class="main_1">
    <p>Today's Thanks Message ⭐️ {{ $today_thanks }}件</p>
</div>
<div class="main_2">
    <p>今まで送られたThanks Message ⭐️ {{ $count }}件</p>
</div>

@auth
<div class="send_page">
    <a href="{{ route('send') }}">メッセージを送る</a>
</div>
@endauth

@endsection
