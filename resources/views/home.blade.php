@extends('layouts.app')


@section('content')
    <x-button disabled class="btn-primary">
        Add Account
    </x-button>
    <x-button class="btn-secondary">
        Read
    </x-button>
    <x-button class="btn-warning">
        Update Account
    </x-button>
    <x-button class="btn-danger">
        Delete Account
    </x-button>
@endsection
