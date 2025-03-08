<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Rate limiting not enabled. Requires middleware and route service provider
    // which are current not avaliable to this project at this time.
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->input('title');
        $filter = $request->input('filter', '');

        $booksQuery = Book::when($title, fn ($query, $title) =>
             $query->title($title)
        );

        $booksQuery = match($filter) {
            'popular_last_month' => $booksQuery->popularLastMonth(),
            'popular_last_6months' => $booksQuery->popularLast6Months(),
            'highest_rated_last_month' => $booksQuery->highestRatedLastMonth(),
            'highest_rated_last_6months' => $booksQuery->highestRatedLast6Months(),
            default => $booksQuery->latest()->withAvgRating()->withReviewsCount()
        };

        // Generate cache key for pagination
        $cacheKey = 'books:' . $filter . ':' . $title . ':' . request('page', 1);

        // Cache the entire paginator (including items and metadata)
        $books = cache()->remember($cacheKey, 3600, fn() => $booksQuery->paginate(10));

        return view('books.index', ['books' => $books]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $cacheKey = 'book:' . $id;

        $book = cache()->remember($cacheKey, 3600, fn() => Book::with([
            'reviews' => fn ($query) => $query->latest()
        ])->withAvgRating()->withReviewsCount()->findOrFail($id));

        return view('books.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
