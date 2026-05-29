@extends('layouts.app')

@section('content')

<style>

.page-modern{
    background:#f1f5f9;
    min-height:100vh;
    padding:50px 0;
}

.page-title{
    font-weight:800;
    font-size:35px;
}

.bookmark-card{
    background:white;
    border:none;
    border-radius:24px;
    overflow:hidden;
    transition:0.35s;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
    height:100%;
}

.bookmark-card:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(37,99,235,0.15);
}

.book-cover{
    height:280px;
    object-fit:cover;
}

.empty-box{
    background:white;
    border-radius:28px;
    padding:60px 30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.dark-mode .page-modern{
    background:#0f172a !important;
}

.dark-mode .bookmark-card,
.dark-mode .empty-box{
    background:#1e293b !important;
    color:white !important;
}

.dark-mode .text-muted{
    color:#cbd5e1 !important;
}

</style>

<div class="page-modern">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">

            <div>

                <h1 class="page-title">
                    <i class="fa-regular fa-bookmark text-primary me-2"></i>
                    Bookmark Saya
                </h1>

                <p class="text-muted mb-0">
                    Koleksi buku favorit yang telah disimpan.
                </p>

            </div>

            <a href="{{ url('/') }}"
               class="btn btn-primary rounded-pill px-4">

                <i class="fa fa-arrow-left me-1"></i>
                Kembali

            </a>

        </div>

        <div class="row g-4">

            @forelse($bookmarks as $bookmark)

            <div class="col-lg-3 col-md-6">

                <div class="bookmark-card">

                    @if($bookmark->cover)

                        <img src="{{ asset('storage/'.$bookmark->cover) }}"
                             class="w-100 book-cover">

                    @else

                        <img src="https://via.placeholder.com/300x400?text=No+Cover"
                             class="w-100 book-cover">

                    @endif

                    <div class="p-4">

                        <span class="badge bg-primary mb-3 rounded-pill px-3 py-2">

                            {{ $bookmark->category->name ?? 'Umum' }}

                        </span>

                        <h5 class="fw-bold mb-2">

                            {{ $bookmark->title }}

                        </h5>

                        <p class="text-muted small mb-3">

                            ✍ {{ $bookmark->author }}

                        </p>

                        <small class="text-muted d-block mb-4">

                            Tahun: {{ $bookmark->year ?? '-' }}

                        </small>

                        <div class="d-flex gap-2">

                            <a href="{{ route('books.read', $bookmark->id) }}"
                               class="btn btn-primary rounded-pill flex-fill">

                                <i class="fa fa-book-open me-1"></i>
                                Baca

                            </a>

                            <form action="{{ route('bookmark.remove', $bookmark->id) }}"
                                  method="POST"
                                  class="loading-form">

                                @csrf

                                <button type="submit"
                                        class="btn btn-danger rounded-pill"
                                        onclick="return confirm('Hapus dari bookmark?')">

                                    <i class="fa-solid fa-bookmark"></i>

                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">

                <div class="empty-box text-center">

                    <div style="font-size:70px;">
                        <i class="fa-regular fa-bookmark text-primary"></i>
                    </div>

                    <h3 class="fw-bold mt-4">
                        Belum Ada Bookmark
                    </h3>

                    <p class="text-muted mb-4">
                        Simpan buku favoritmu agar mudah dibaca kembali.
                    </p>

                    <a href="{{ url('/') }}"
                       class="btn btn-primary rounded-pill px-4">

                        Cari Buku

                    </a>

                </div>

            </div>

            @endforelse

        </div>

    </div>

</div>

@endsection