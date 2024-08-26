<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
class BookController extends Controller
{
    //
    public function index() 
    {
        $books = Book::all();
        return response()->json($books, 200);
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['message' => "book not found", 404]);
        }

        return response()->json($book, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'nullable|string',
            'author' => 'nullable|string',
            'publication_year' => 'nullable|integer',
            'description' => 'nullable|string',
            'image' => 'nullable|string',
            'publishedDate' => 'nullable|string',
            'language' => 'nullable|string',
            'city' => 'nullable|string',
            'state' => 'nullable|string',
            'neighborhood' => 'nullable|string'

        ]);

        $book = Book::create($validatedData);

        return response()->json($book, 201);
    }
}
