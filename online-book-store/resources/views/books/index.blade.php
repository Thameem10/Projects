@extends('layouts.app')

@section('content')
<h1 class="mb-4 text-primary">Book List</h1>
<table class="table table-striped table-bordered table-hover align-middle">
    <thead class="table-dark">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Available</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>{{ $book->author }}</td>
            <td>{{ $book->price }}</td>
            <td>
                <span class="badge {{ $book->is_available ? 'bg-success' : 'bg-danger' }}">
                    {{ $book->is_available ? 'Yes' : 'No' }}
                </span>
            </td>
            <td>
                <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-primary">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
