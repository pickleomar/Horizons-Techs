@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        <label for="">name</label>
        <input type="text" name="name">
        <label for="">email</label>

        <input type="email" name="email">
        <label for="">password</label>
        <input type="password" name="password">
        <button type="submit">Submit</button>
    </form>
@endsection
