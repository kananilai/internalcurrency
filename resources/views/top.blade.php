@extends('layouts.app')

@section('content')
<div class="login_user">
    @if(isset($items))
    <p>ð {{ $items->name }}ãã</p>
    @endif
</div>

<div class="main_1">
    <p>Today's Thanks Message â­ï¸ {{ $today_thanks }}ä»¶</p>
</div>
<div class="main_2">
    <p>ä»ã¾ã§éãããThanks Message â­ï¸ {{ $count }}ä»¶</p>
</div>

@auth
<div class="send_page">
    <a href="{{ route('send') }}">ã¡ãã»ã¼ã¸ãéã</a>
</div>
@endauth

@endsection
