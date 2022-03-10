@extends('layouts.app')

@section('content')
<div class="title">
    <h1>ログイン</h1>
</div>
<div class="error_text login_error">
@if(isset($message))
    <h2>{{ $message }}</h2>
@endif
</div>
<form action="/login" method="POST">
    @csrf
    <table class="form_table">
        <tr>
            <td>Email</td>
            <td>
                <input type="email" name="email" placeholder="Youre email" value="{{ old('email') }}">
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" placeholder="Enter Password" value="{{ old('password') }}">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input class="button" type="submit" value="Login">
            </td>
        </tr>
    </table>
</form>
@endsection
