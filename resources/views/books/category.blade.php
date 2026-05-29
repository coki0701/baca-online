@extends('layouts.app')

@section('content')

<style>

.d-flex::-webkit-scrollbar{
    height:8px;
}

.d-flex::-webkit-scrollbar-thumb{
    background:#cbd5e1;
    border-radius:20px;
}

.category-page{
    background:#f1f5f9;
    min-height:100vh;
    padding:50px 0;
}

.book-card{
    background:white;
    border:none;
    border-radius:24px;
    overflow:hidden;
    transition:0.35s;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
    height:100%;
}

.book-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(37,99,235,0.15);
}

.book-cover{
    height:280px;
    object-fit:cover;
}

.dark-mode .category-page{
    background:#0f172a !important;
}

.dark-mode .book-card{
    background:#1e293b !important;
    color:white !important;
}

.dark-mode .text-muted{
    color:#cbd5e1 !important;
}

</style>

<div class="category-page">

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">

        <div>

            <h1 class="fw-bold">

                📚 {{ $category->name }}

            </h1>

            <p class="text-muted mb-0">

                {{ $books->count() }} buku tersedia

            </p>

        </div>

        <a href="{{ url('/') }}"
           class="btn btn-primary rounded-pill px-4">

            ⬅ Kembali

        </a>

    </div>

    <div class="d-flex gap-4 overflow-auto pb-3 justify-content-center flex-nowrap">

    @forelse($books as $book)

    <div style="min-width:320px; max-width:320px;">

        <div class="simple-card text-center h-100">

            @if($book->cover)

                <img src="{{ asset('storage/'.$book->cover) }}"
                     class="book-cover mb-3"
                     style="width:120px;height:170px;object-fit:cover;">

            @else

                <img src="https://via.placeholder.com/120x170?text=No+Cover"
                     class="book-cover mb-3">

            @endif

            <h5 class="fw-bold mb-2">

                {{ $book->title }}

            </h5>

            <p class="text-muted small mb-3">

                ✍ {{ $book->author }}

                <br>

                {{ $book->year ?? '-' }}

            </p>

            <a href="{{ route('books.read', $book->id) }}"
               class="btn btn-primary rounded-pill px-4">

                📖 Baca

            </a>

        </div>

    </div>

    @empty

    <div class="alert alert-warning rounded-4">
        Belum ada buku di kategori ini.
    </div>

    @endforelse

</div>

</div>

</div>

@endsection