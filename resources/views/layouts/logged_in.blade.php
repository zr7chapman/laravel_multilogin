@extends('layouts.default')
 
@section('header')
<header>
    <ul class="header_nav">
        <li>こんにちは、{{ Auth::user()->name }}さん！</li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" value="ログアウト">
            </form>
        </li>
    </ul>
</header>
@endsection