@extends('layouts.app')

@section('content')
<h1 class="mb-3 text-primary">Welcome to the Online Book Store</h1>
<p class="lead">Discover and manage your favourite books.</p>

@if($weatherData)
    <div class="alert alert-info mt-4">
        <h4 class="mb-2">Weather in {{ $city }}</h4>
        <p class="mb-1"><strong>Temperature:</strong> {{ $weatherData['main']['temp'] }}°C</p>
        <p class="mb-0"><strong>Condition:</strong> {{ ucfirst($weatherData['weather'][0]['description']) }}</p>
    </div>
@endif

<h3 class="mt-4 mb-3">Featured Books</h3>
<ul class="list-group">
    @foreach($books as $book)
        <li class="list-group-item">
            <a class="text-decoration-none fw-bold" href="{{ route('books.show', $book->id) }}">
                {{ $book->title }}
            </a>
            <span class="text-muted"> by {{ $book->author }}</span>
        </li>
    @endforeach
</ul>
@endsection
