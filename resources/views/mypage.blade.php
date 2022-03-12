@extends('layouts.app')

@section('content')

<div>
    <div class="title recive_title">
        <p> 受け取ったメッセージ </p>
    </div>
    <div class="card">
        @if(!empty($items))
        @foreach($items as $item)
        <div class="card_box">
            <div class="card_tape"> </div>
            <p class="card_title">From {{ $send_name->name}}さん</p>
            <p>{{ $item -> message }}</p>
        </div>
        @endforeach
        @else
            <p class="title zero_message">{{ $message }}</p>
        @endif
    </div>
    <div class="card">
        @if(!empty($sended))
            @foreach($sended as $send)
            <div class="card_box">
                <div class="card_tape"> </div>
                <p class="card_title">From {{ $send_name->name}}さん</p>
                <p>{{ $send -> message }}</p>
            </div>
            @endforeach
        @else
            <p class="title zero_message">{{ $send_message }}</p>
        @endif

    </div>

</div>

@endsection
