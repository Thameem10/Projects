<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class OnlineBookController extends Controller
{
    public function home()
{
    // Fetch latest books
    $books = Book::latest()->take(5)->get();

    // Weather API Call
    $city = 'Chennai'; // You can change or make dynamic
    $apiKey = '18a782504ab47da59ce0cfbc2e06fb84'; // Replace with your real key
    $weatherUrl = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

    $weatherData = null;

    try {
        $response = file_get_contents($weatherUrl);
        if ($response) {
            $weatherData = json_decode($response, true);
        }
    } catch (\Exception $e) {
        $weatherData = null;
    }

    return view('home', compact('books', 'weatherData', 'city'));
}
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    // Show list of books
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    // Show create form
    public function create()
    {
        return view('books.create');
    }

    // Store new book
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'nullable|numeric',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book added successfully');
    }

    // Show edit form
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    // Update book
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'price' => 'nullable|numeric',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

    // Delete book
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
