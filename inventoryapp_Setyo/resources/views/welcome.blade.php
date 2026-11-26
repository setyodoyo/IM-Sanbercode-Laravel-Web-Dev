@extends('layouts.master')
@section('title')
    <h1>SELAMAT DATANG!</h1>
@endsection

@section('content')
    <h2>
        Terima kasih telah bergabung di Sanberbook,
        {{ $firstname }} {{ $lastname }}.
        Social Media kita bersama!
    </h2>
@endsection