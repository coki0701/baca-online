@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HERO --}}
    <div class="p-5 mb-5 rounded-4 shadow-lg text-white position-relative overflow-hidden"
         style="background: linear-gradient(135deg, #2563eb, #1e40af);">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <h1 class="fw-bold display-5 mb-3">
                    📚 Perpustakaan Digital
                </h1>

                <p class="fs-5 text-light">

                    Temukan buku digital,
                    baca kapan saja,
                    dan nikmati pengalaman membaca.

                </p>

                <div class="mt-4 d-flex gap-3 flex-wrap">

                    <a href="{{ route('history') }}"
                       class="btn btn-light rounded-pill px-4">

                        📖 Riwayat Bacaan

                    </a>

                    <a href="{{ route('bookmark.list') }}"
                       class="btn btn-warning rounded-pill px-4">

                        ⭐ Bookmark

                    </a>

                </div>

            </div>

            <div class="col-lg-5 text-center d-none d-lg-block">

                <div style="font-size: 180px;">
                    📚
                </div>

            </div>

        </div>

    </div>

    {{-- SEARCH --}}
    <div class="card border-0 shadow-sm rounded-4 mb-5">

        <div class="card-body p-4">

            <form method="GET"
                  action="{{ route('books.index') }}">

                <div class="row g-3">

                    <div class="col-md-6">

                        <input type="text"
                               name="search"
                               class="form-control form-control-lg rounded-3"
                               placeholder="Cari judul buku..."
                               value="{{ request('search') }}">

                    </div>

                    <div class="col-md-4">

                        <select name="category"
                                class="form-select form-select-lg rounded-3">

                            <option value="">
                                Semua Kategori
                            </option>

                            @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    {{ request('category') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="col-md-2 d-grid">

                        <button class="btn btn-primary btn-lg rounded-3">

                            🔍 Cari

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success rounded-4 shadow-sm">

            {{ session('success') }}

        </div>

    @endif

    {{-- PENGUMUMAN --}}
    @if($announcements->count())

    <div class="mb-5">

        <h3 class="fw-bold mb-4">
            📢 Pengumuman
        </h3>

        <div class="row g-4">

            @foreach($announcements as $announcement)

            <div class="col-md-6">

                <div class="card border-0 shadow-sm rounded-4 h-100">

                    <div class="card-body">

                        <h5 class="fw-bold">

                            {{ $announcement->title }}

                        </h5>

                        <p class="text-muted mb-0">

                            {{ $announcement->content }}

                        </p>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

    @endif

    {{-- TITLE --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            📚 Koleksi Buku
        </h3>

        <span class="badge bg-primary fs-6">

            {{ $books->count() }} Buku

        </span>

    </div>

    {{-- BOOK GRID --}}
    <div class="row g-4">

        @forelse($books as $book)

        <div class="col-md-6 col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 h-100 overflow-hidden
                        hover-card">

                {{-- COVER --}}
                @if($book->cover)

                    <img src="{{ asset('storage/' . $book->cover) }}"
                         class="card-img-top"
                         style="height: 320px; object-fit: cover;">

                @else

                    <div class="bg-light d-flex align-items-center justify-content-center"
                         style="height: 320px;">

                        <span style="font-size:80px;">
                            📚
                        </span>

                    </div>

                @endif

                {{-- BODY --}}
                <div class="card-body d-flex flex-column">

                    <h5 class="fw-bold mb-2">

                        {{ $book->title }}

                    </h5>

                    <p class="text-muted mb-3">

                        ✍ {{ $book->author }}

                    </p>

                    <div class="mt-auto">

                        {{-- BUTTONS --}}
                        <div class="d-grid gap-2">

                            <a href="{{ route('books.read', $book->id) }}"
                               target="_blank"
                               class="btn btn-primary rounded-3">

                                📖 Baca Buku

                            </a>

                            <form action="{{ route('bookmark.store', $book->id) }}"
                                  method="POST"
                                  class="loading-form">

                                @csrf

                                <button class="btn btn-warning w-100 rounded-3">

                                    ⭐ Bookmark

                                </button>

                            </form>

                            <form action="{{ route('borrow.store', $book->id) }}"
                                  method="POST"
                                  class="loading-form">

                                @csrf

                                <button class="btn btn-success w-100 rounded-3">

                                    📚 Pinjam Buku

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="alert alert-secondary rounded-4 text-center p-5">

                <h4>
                    📚 Buku tidak ditemukan
                </h4>

            </div>

        </div>

        @endforelse

    </div>

</div>

{{-- STYLE --}}
<style>

.hover-card{
    transition: .3s;
}

.hover-card:hover{
    transform: translateY(-6px);
}

</style>

@endsection