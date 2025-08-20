@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-primary">Edit Book</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.update', $book->id) }}" method="POST" class="border p-4 rounded shadow-sm bg-light">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title:</label>
            <input type="text" name="title" value="{{ old('title', $book->title) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Author:</label>
            <input type="text" name="author" value="{{ old('author', $book->author) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Price:</label>
            <input type="number" name="price" value="{{ old('price', $book->price) }}" step="0.01" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Book</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary ms-2">Back to List</a>
    </form>
</div>
@endsection
