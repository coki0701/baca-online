@extends('layouts.app')

@section('content')

<div class="container py-4">

    {{-- HERO --}}
    <div class="card border-0 shadow-lg rounded-4 overflow-hidden mb-5">

        <div class="card-body p-5 text-white position-relative"
             style="background: linear-gradient(135deg, #2563eb, #1d4ed8, #1e40af);">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <h1 class="fw-bold display-5 mb-3">

                        👋 Halo, {{ auth()->user()->name }}

                    </h1>

                    <p class="fs-5 text-light mb-4">

                        Selamat datang kembali di
                        Perpustakaan Digital.
                        Nikmati pengalaman membaca modern
                        kapan saja dan di mana saja.

                    </p>

                    <div class="d-flex gap-3 flex-wrap">

                        <a href="{{ route('books.index') }}"
                           class="btn btn-light rounded-pill px-4">

                            📚 Jelajahi Buku

                        </a>

                        <a href="{{ route('history') }}"
                           class="btn btn-outline-light rounded-pill px-4">

                            📖 Riwayat Bacaan

                        </a>

                    </div>

                </div>

                <div class="col-lg-4 text-center d-none d-lg-block">

                    <div style="font-size: 180px;">
                        📚
                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- MENU CEPAT --}}
    <div class="row g-4 mb-5">

        <div class="col-md-3">

            <a href="{{ route('books.index') }}"
               class="text-decoration-none">

                <div class="card border-0 shadow-sm rounded-4 h-100 hover-card">

                    <div class="card-body text-center p-4">

                        <div class="mb-3"
                             style="font-size:60px;">

                            📚

                        </div>

                        <h5 class="fw-bold">

                            Koleksi Buku

                        </h5>

                        <p class="text-muted mb-0">

                            Jelajahi semua buku digital

                        </p>

                    </div>

                </div>

            </a>

        </div>

        <div class="col-md-3">

            <a href="{{ route('bookmark.list') }}"
               class="text-decoration-none">

                <div class="card border-0 shadow-sm rounded-4 h-100 hover-card">

                    <div class="card-body text-center p-4">

                        <div class="mb-3"
                             style="font-size:60px;">

                            ⭐

                        </div>

                        <h5 class="fw-bold">

                            Bookmark

                        </h5>

                        <p class="text-muted mb-0">

                            Buku favorit tersimpan

                        </p>

                    </div>

                </div>

            </a>

        </div>

        <div class="col-md-3">

        <div class="col-md-3">

            <a href="{{ route('history') }}"
               class="text-decoration-none">

                <div class="card border-0 shadow-sm rounded-4 h-100 hover-card">

                    <div class="card-body text-center p-4">

                        <div class="mb-3"
                             style="font-size:60px;">

                            🕘

                        </div>

                        <h5 class="fw-bold">

                            Riwayat

                        </h5>

                        <p class="text-muted mb-0">

                            Aktivitas membaca

                        </p>

                    </div>

                </div>

            </a>

        </div>

    </div>

    {{-- INFO USER --}}
    <div class="row g-4">

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4 text-center">

                    <div class="rounded-circle bg-primary
                                text-white d-flex
                                align-items-center
                                justify-content-center mx-auto mb-4"
                         style="width:100px; height:100px; font-size:40px;">

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>

                    <h4 class="fw-bold">

                        {{ auth()->user()->name }}

                    </h4>

                    <p class="text-muted">

                        {{ auth()->user()->email }}

                    </p>

                    <span class="badge bg-success px-3 py-2">

                        User Active

                    </span>

                </div>

            </div>

        </div>

        <div class="col-lg-8">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">

                        📌 Informasi Akun

                    </h4>

                    <div class="row g-4">

                        <div class="col-md-6">

                            <div class="border rounded-4 p-4">

                                <h6 class="text-muted">

                                    Nama Lengkap

                                </h6>

                                <h5 class="fw-bold mb-0">

                                    {{ auth()->user()->name }}

                                </h5>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="border rounded-4 p-4">

                                <h6 class="text-muted">

                                    Email

                                </h6>

                                <h5 class="fw-bold mb-0">

                                    {{ auth()->user()->email }}

                                </h5>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="border rounded-4 p-4">

                                <h6 class="text-muted">

                                    Role

                                </h6>

                                <h5 class="fw-bold mb-0">

                                    {{ auth()->user()->role }}

                                </h5>

                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="border rounded-4 p-4">

                                <h6 class="text-muted">

                                    Bergabung

                                </h6>

                                <h5 class="fw-bold mb-0">

                                    {{ auth()->user()->created_at 
                                     ? auth()->user()->created_at->format('d M Y')
                                    : '-' }}

                                </h5>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="card border-0 shadow-sm rounded-4 mt-4">

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-4">

    <h4>
        🔔 Notifikasi
    </h4>

    @if($unreadNotifications > 0)

        <span class="badge bg-danger rounded-pill">

            {{ $unreadNotifications }} Baru

        </span>

    @endif

</div>

        @forelse($notifications as $notification)

            <div class="alert alert-light border mb-3">

                {{ $notification->message }}

                <br>

                <small class="text-muted">

                    {{ $notification->created_at->diffForHumans() }}

                </small>

            </div>

        @empty

            <div class="text-muted">

                Belum ada notifikasi

            </div>

        @endforelse

    </div>

</div>

</div>

<style>

.hover-card{
    transition: .3s;
}

.hover-card:hover{
    transform: translateY(-7px);
}

</style>

@endsection