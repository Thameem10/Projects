@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-3 text-primary">Admin Dashboard</h1>
    <p class="lead">Welcome, <strong>{{ auth()->user()->name ?? 'Admin' }}</strong>!</p>

    <a href="{{ route('books.create') }}" class="btn btn-success mb-3">Add New Book</a>

    <hr>
    <h3 class="mb-3">All Books</h3>
    <table class="table table-bordered table-striped table-hover align-middle">
        <thead class="table-dark">
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Price</th>
                <th style="width: 180px;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>₹{{ $book->price }}</td>
                <td>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Are you sure you want to delete this book?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
