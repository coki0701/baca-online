@extends('layouts.app')

@section('content')

<style>

.history-page{
    background:#f1f5f9;
    min-height:100vh;
    padding:50px 0;
}

.history-card{
    background:white;
    border:none;
    border-radius:24px;
    overflow:hidden;
    transition:0.35s;
    box-shadow:0 10px 30px rgba(0,0,0,0.06);
}

.history-card:hover{
    transform:translateY(-6px);
    box-shadow:0 20px 40px rgba(37,99,235,0.15);
}

.book-thumb{
    width:100px;
    height:130px;
    object-fit:cover;
    border-radius:16px;
}

.empty-box{
    background:white;
    border-radius:28px;
    padding:60px 30px;
    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.dark-mode .history-page{
    background:#0f172a !important;
}

.dark-mode .history-card,
.dark-mode .empty-box{
    background:#1e293b !important;
    color:white !important;
}

.dark-mode .text-muted{
    color:#cbd5e1 !important;
}

</style>

<div class="history-page">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-5 flex-wrap gap-3">

            <div>

                <h1 class="fw-bold">
                    <i class="fa fa-clock-rotate-left text-primary me-2"></i>
                    Riwayat Membaca
                </h1>

                <p class="text-muted mb-0">
                    Daftar buku yang pernah dibaca.
                </p>

            </div>

            <a href="{{ url('/') }}"
               class="btn btn-primary rounded-pill px-4">

                <i class="fa fa-arrow-left me-1"></i>
                Kembali

            </a>

        </div>

        <div class="row g-4">

            @forelse($histories as $history)

                @if($history->book)

                <div class="col-lg-6">

                    <div class="history-card p-4">

                        <div class="d-flex gap-4 flex-wrap flex-md-nowrap">

                            @if($history->book->cover)

                                <img src="{{ asset('storage/'.$history->book->cover) }}"
                                     class="book-thumb">

                            @else

                                <img src="https://via.placeholder.com/120x160?text=No+Cover"
                                     class="book-thumb">

                            @endif

                            <div class="flex-grow-1">

                                <span class="badge bg-primary rounded-pill mb-2 px-3 py-2">

                                    {{ $history->book->category->name ?? 'Umum' }}

                                </span>

                                <h4 class="fw-bold mb-2">

                                    {{ $history->book->title }}

                                </h4>

                                <p class="text-muted mb-2">

                                    ✍ {{ $history->book->author }}

                                </p>

                                <small class="text-muted d-block mb-3">

                                    Dibaca:
                                    {{ $history->updated_at->diffForHumans() }}

                                </small>

                                <a href="{{ route('books.read', $history->book->id) }}"
                                   class="btn btn-primary rounded-pill px-4">

                                    <i class="fa fa-book-open me-1"></i>
                                    Lanjut Membaca

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

                @endif

            @empty

            <div class="col-12">

                <div class="empty-box text-center">

                    <div style="font-size:70px;">
                        <i class="fa fa-clock-rotate-left text-primary"></i>
                    </div>

                    <h3 class="fw-bold mt-4">
                        Belum Ada Riwayat
                    </h3>

                    <p class="text-muted mb-4">
                        Buku yang dibaca akan muncul di sini.
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