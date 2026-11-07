<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Book::with('category');

    if ($request->filled('judul')) {
        $query->where('judul', 'like', '%'.$request->query('judul').'%');
    }

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->query('category_id'));
    }

    $books = $query->paginate(10);

    return BookResource::collection($books);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
{
    $book = Book::create($request->validated());

    return (new BookResource($book->load('category')))
        ->response()
        ->setStatusCode(201);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $book = Book::with('category')->findOrFail($id);

    return new BookResource($book);
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $book = Book::findOrFail($id);

    $validated = $request->validate([
        'judul' => 'required|string|max:200',
        'penulis' => 'required|string|max:100',
        'penerbit' => 'required|string|max:100',
        'tahun_terbit' => 'required|integer|min:1900|max:'.date('Y'),
        'isbn' => 'nullable|string|max:20',
        'stok' => 'required|integer|min:0',
        'category_id' => 'required|integer|exists:categories,id',
    ]);

    $book->update($validated);

    return new BookResource($book->load('category'));
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $book = Book::findOrFail($id);
    $book->delete();

    return response()->json(['message' => 'Buku berhasil dihapus.']);
}
}
