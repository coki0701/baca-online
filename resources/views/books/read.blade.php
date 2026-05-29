@extends('layouts.app')

@section('content')

<style>

.read-page{
    background:#f1f5f9;
    min-height:100vh;
    padding:40px 0;
}

.read-card{
    background:white;
    border-radius:28px;
    overflow:hidden;
    box-shadow:0 10px 40px rgba(0,0,0,0.08);
}

.book-sidebar{
    background:linear-gradient(180deg,#2563eb,#1e3a8a);
    color:white;
    height:100%;
    padding:35px;
}

.book-cover{
    width:100%;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
}

.book-info h2{
    font-weight:800;
}

.book-info p{
    opacity:0.9;
}

.info-box{
    background:rgba(255,255,255,0.12);
    border-radius:18px;
    padding:15px;
    margin-top:15px;
}

.viewer-box{
    padding:25px;
}

.pdf-frame{
    width:100%;
    height:85vh;
    border:none;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 5px 20px rgba(0,0,0,0.08);
}

.comment-card{
    border:none;
    border-radius:20px;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
}

.comment-item{
    background:#f8fafc;
    border-radius:18px;
    padding:18px;
}

.avatar{
    width:50px;
    height:50px;
    border-radius:50%;
    background:#2563eb;
    display:flex;
    align-items:center;
    justify-content:center;
    color:white;
    font-weight:bold;
}

.dark-mode .read-page{
    background:#0f172a !important;
}

.dark-mode .read-card,
.dark-mode .comment-card{
    background:#1e293b !important;
    color:white !important;
}

.dark-mode .viewer-box{
    background:#1e293b !important;
}

.dark-mode .comment-item{
    background:#334155 !important;
}

.dark-mode textarea{
    background:#334155 !important;
    color:white !important;
    border:none !important;
}

.dark-mode .text-muted{
    color:#cbd5e1 !important;
}

</style>

<div class="read-page">

<div class="container-fluid">

<div class="row g-4">

    {{-- SIDEBAR --}}
    <div class="col-lg-3">

        <div class="read-card h-100">

            <div class="book-sidebar">

                @if($book->cover)

                    <img src="{{ asset('storage/'.$book->cover) }}"
                         class="book-cover mb-4">

                @endif

                <div class="book-info">

                    <h2>{{ $book->title }}</h2>

                    <p class="mb-4">
                        ✍ {{ $book->author }}
                    </p>

                    <div class="info-box">

                        <small>Kategori</small>

                        <h6 class="mb-0 mt-1">
                            {{ $book->category->name ?? '-' }}
                        </h6>

                    </div>

                    <div class="info-box">

                        <small>Tahun</small>

                        <h6 class="mb-0 mt-1">
                            {{ $book->year }}
                        </h6>

                    </div>

                    <div class="info-box">

                        <small>Total Komentar</small>

                        <h6 class="mb-0 mt-1">
                            {{ $book->comments->count() }}
                        </h6>

                    </div>

                    <div class="info-box">

                        <small>Status Buku</small>

                        <h6 class="mb-0 mt-1 text-success">
                            📖 Tersedia Dibaca
                        </h6>

                    </div>

                    @if(isset($fromAdmin) && $fromAdmin == true)

                <a href="{{ route('admin.books.index') }}"
                class="btn btn-light w-100 rounded-pill mt-4">

                    ⬅ Kembali ke Admin

                </a>

            @else

                <a href="{{ url('/') }}"
                class="btn btn-light w-100 rounded-pill mt-4">

                    ⬅ Kembali

                </a>

                <form action="{{ route('bookmark.store', $book->id) }}"
                method="POST"
                class="loading-form">

    @csrf

    <button class="btn btn-warning w-100 rounded-pill">

        <i class="fa-regular fa-bookmark me-1"></i>

        Simpan Bookmark

    </button>

</form>

            @endif

                </div>

            </div>

        </div>

    </div>

    {{-- PDF VIEWER --}}
    <div class="col-lg-9">

        <div class="read-card mb-4">

            <div class="viewer-box">

                <iframe
                    src="{{ asset('storage/' . $book->file_path) }}"
                    class="pdf-frame">
                </iframe>

            </div>

        </div>

        {{-- KOMENTAR --}}
        <div class="comment-card">

            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h4 class="fw-bold mb-0">
                        💬 Komentar Pembaca
                    </h4>

                    <span class="badge bg-primary rounded-pill px-3 py-2">

                        {{ $book->comments->count() }} Komentar

                    </span>

                </div>

                {{-- FORM --}}
                @if(session('success'))
    <div class="alert alert-success rounded-4">
        {{ session('success') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger rounded-4">
        @foreach($errors->all() as $error)
            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif

<form action="{{ route('comment.store', $book->id) }}"
      method="POST"
      class="loading-form">

    @csrf

    <input type="text"
           name="guest_name"
           class="form-control rounded-4 mb-3"
           placeholder="Nama Anda"
           required>

    <textarea name="comment"
              rows="4"
              class="form-control rounded-4 mb-3"
              placeholder="Tulis komentar..."
              required></textarea>

    <button type="submit"
            class="btn btn-primary rounded-pill px-4">
        Kirim Komentar
    </button>

</form>

                {{-- LIST --}}
                @forelse($book->comments as $comment)

                <div class="comment-item mb-3">

                    <div class="d-flex">

                        <div class="avatar me-3">

                            {{ strtoupper(substr($comment->guest_name ?? 'P',0,1)) }}

                        </div>

                        <div class="w-100">

                            <div class="d-flex justify-content-between">

                                <h6 class="fw-bold mb-1">

                                    {{ $comment->guest_name ?? 'Pengunjung' }}

                                </h6>

                                <small class="text-muted">

                                    {{ $comment->created_at->diffForHumans() }}

                                </small>

                            </div>

                            <p class="mb-0">

                                {{ $comment->comment }}

                            </p>
                            

                        </div>

                    </div>

                </div>

                @empty

                <div class="text-center py-5">

                    <div style="font-size:60px;">
                        💬
                    </div>

                    <h5 class="mt-3">
                        Belum Ada Komentar
                    </h5>

                </div>

                @endforelse

            </div>

        </div>

    </div>

</div>

</div>

</div>

@endsection