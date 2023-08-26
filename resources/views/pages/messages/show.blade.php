<!-- resources/views/messages/show.blade.php -->

@extends('layouts.apis')

@section('content')
    <div class="container">
        <h1>Conversation with {{ $user->prenom }} {{ $user->nom }}</h1>

        <div class="message-container">
            @foreach ($messages as $message)
                <div class="message">
                    <div class="message-header">
                        <strong>{{ $message->sender->prenom }}:</strong>
                    </div>
                    <div class="message-body">
                        <p>{{ $message->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <form action="{{ route('messaging.store') }}" method="post" class="message-form">
            @csrf
            <input type="hidden" name="sender_id" value="{{ session('the_user')[0]->id }}">
            <input type="hidden" name="recipient_id" value="{{ $user->id }}">
            <textarea name="content" rows="3" placeholder="Write a message" class="form-control"></textarea>
            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection