@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4">
    <h1 class="text-primary mb-3">{{ $book->title }}</h1>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Category:</strong> {{ $book->category }}</p>
    <p><strong>Price:</strong> ₹{{ $book->price }}</p>
    <p>
        <strong>Available:</strong>
        <span class="badge {{ $book->is_available ? 'bg-success' : 'bg-danger' }}">
            {{ $book->is_available ? 'Yes' : 'No' }}
        </span>
    </p>

    <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>
@endsection
