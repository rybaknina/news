@extends('layouts.admin')
@section('content')
    <h2>Welcome to Admin Panel</h2>
    <br>
    @php $message = "I'm message. How are you?";
    @endphp
    <x-alert type="danger" :message="$message"></x-alert>
    <x-alert type="success" :message="$message"></x-alert>
    <x-alert type="info" :message="$message"></x-alert>
    <x-alert type="warning" :message="$message"></x-alert>
@endsection
