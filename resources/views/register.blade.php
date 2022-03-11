@extends('layouts.app')

@section('content')

<div class="title">
    <h1>新規登録</h1>
</div>
<form action="/register" method="POST">
    @csrf
    <table class="form_table">
        <tr>
            <td>Name</td>
            <td>
                <input type="text" name="name" placeholder="Youre Name" value="{{ old('name') }}">
                @if ($errors->first('name'))
                <div class="error_text">
                    {{ $errors->first('name') }}
                </div>
                @endif
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email" placeholder="Youre email" value="{{ old('email') }}">
                @if ($errors->first('email'))
                <div class="error_text">
                    {{ $errors->first('email') }}
                </div>
                @endif
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" placeholder="Enter Password" value="{{ old('password') }}">
                @if ($errors->first('password'))
                <div class="error_text">
                    {{ $errors->first('password') }}
                </div>
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="button" type="submit" value="登録">
            </td>
        </tr>
    </table>
</form>
@endsection
