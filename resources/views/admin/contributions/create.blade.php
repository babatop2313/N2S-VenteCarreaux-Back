<!-- resources/views/contributions/create.blade.php -->

@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Ajouter une cotisation</h1>

        <form action="{{ route('contributions.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="user_id">User:</label>
                <select class="form-control" name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->prenom }} {{ $user->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input class="form-control" type="number" name="amount" id="amount" step="0.01" min="0" required>
            </div>
            <div class="form-group">
                <label for="date">Date:</label>
                <input class="form-control" type="date" name="date" id="date" required>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
@endsection