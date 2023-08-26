<!-- resources/views/messages/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Messages</h1>

    <ul>
        @foreach ($users as $user)
         @if (session('the_user')[0]->id != $user->id)
            <li><a href="{{ route('messaging.show', $user) }}">{{ $user->prenom }} {{ $user->nom }}</a></li>
         @endif
        @endforeach
    </ul>
@endsection