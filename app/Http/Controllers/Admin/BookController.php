<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $books = Book::latest()->get();

        return view('admin.books.index', compact('books'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $categories = Category::all();

        return view('admin.books.create', compact('categories'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
    
    $request->validate([

    'title' => 'required|string|max:255',

    'author' => 'required|string|max:255',

    'year' => 'required|numeric|min:1900|max:'.date('Y'),

    'category_id' => 'required|exists:categories,id',

    'description' => 'required|string',

    'cover' => 'required|image|mimes:jpg,jpeg,png|max:2048',

    'file' => 'required|mimes:pdf|max:204800',

], [

    'title.required' => 'Judul buku wajib diisi',

    'author.required' => 'Penulis wajib diisi',

    'year.required' => 'Tahun wajib diisi',
    'year.min' => 'Tahun tidak valid',
    'year.max' => 'Tahun tidak boleh melebihi tahun sekarang',

    'category_id.required' => 'Kategori wajib dipilih',
    'category_id.exists' => 'Kategori tidak valid',

    'description.required' => 'Deskripsi wajib diisi',

    'cover.required' => 'Cover wajib diupload',
    'cover.image' => 'Cover harus berupa gambar',
    'cover.mimes' => 'Cover harus berformat JPG, JPEG, atau PNG',
    'cover.max' => 'Ukuran cover maksimal 2 MB',

    'file.required' => 'File PDF wajib diupload',
    'file.mimes' => 'File harus berformat PDF',
    'file.max' => 'Ukuran file PDF maksimal 200 MB',

]);

        /*
        |--------------------------------------------------------------------------
        | UPLOAD COVER
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('cover')) {

            $cover = $request->file('cover');

            $originalName = pathinfo(
                $cover->getClientOriginalName(),
                PATHINFO_FILENAME
            );

            $originalName = str_replace(' ', '_', $originalName);

            $extension = $cover->getClientOriginalExtension();

            $coverName = time() . '_' . $originalName . '.' . $extension;

            $cover->storeAs('covers', $coverName, 'public');

            $coverPath = 'covers/' . $coverName;
        }

        /*
        |--------------------------------------------------------------------------
        | UPLOAD PDF
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('file')) {

            $file = $request->file('file');

            $originalName = pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            );

            $originalName = str_replace(' ', '_', $originalName);

            $extension = $file->getClientOriginalExtension();

            $filename = time() . '_' . $originalName . '.' . $extension;

            $file->storeAs('books', $filename, 'public');

            $filePath = 'books/' . $filename;
        }

        /*
        |--------------------------------------------------------------------------
        | SAVE DATABASE
        |--------------------------------------------------------------------------
        */

        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'description' => $request->description,
            'cover' => $coverPath,
            'file_path' => $filePath,
            'category_id' => $request->category_id,
        ]);

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | READ BOOK
    |--------------------------------------------------------------------------
    */

    public function read($id)
    {
        $book = Book::findOrFail($id);

        return view('books.read', compact('book'));
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        $categories = Category::all();

        return view('admin.books.edit', compact('book', 'categories'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'year' => 'required|numeric',
            'category_id' => 'required',
            'description' => 'nullable',
        ]);

        $data = [
            'title' => $request->title,
            'author' => $request->author,
            'year' => $request->year,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ];

        /*
        |--------------------------------------------------------------------------
        | UPDATE COVER
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('cover')) {

            // hapus cover lama
            if ($book->cover) {
                Storage::disk('public')->delete($book->cover);
            }

            $cover = $request->file('cover');

            $originalName = pathinfo(
                $cover->getClientOriginalName(),
                PATHINFO_FILENAME
            );

            $originalName = str_replace(' ', '_', $originalName);

            $extension = $cover->getClientOriginalExtension();

            $coverName = time() . '_' . $originalName . '.' . $extension;

            $cover->storeAs('covers', $coverName, 'public');

            $data['cover'] = 'covers/' . $coverName;
        }

        /*
        |--------------------------------------------------------------------------
        | UPDATE PDF
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('file')) {

            // hapus pdf lama
            if ($book->file_path) {
                Storage::disk('public')->delete($book->file_path);
            }

            $file = $request->file('file');

            $originalName = pathinfo(
                $file->getClientOriginalName(),
                PATHINFO_FILENAME
            );

            $originalName = str_replace(' ', '_', $originalName);

            $extension = $file->getClientOriginalExtension();

            $filename = time() . '_' . $originalName . '.' . $extension;

            $file->storeAs('books', $filename, 'public');

            $data['file_path'] = 'books/' . $filename;
        }

        $book->update($data);

        return redirect()
            ->route('admin.books.index')
            ->with('success', 'Buku berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // hapus cover
        if ($book->cover) {
            Storage::disk('public')->delete($book->cover);
        }

        // hapus pdf
        if ($book->file_path) {
            Storage::disk('public')->delete($book->file_path);
        }

        $book->delete();

        return back()->with('success', 'Buku berhasil dihapus');
    }
}