@extends('admin.layouts.app')

@section('title', 'Laporan')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h2 class="fw-bold mb-1">
                📊 Laporan Sistem
            </h2>

            <p class="text-muted mb-0">
                Statistik dan laporan perpustakaan digital.
            </p>

        </div>

        <div class="d-flex gap-2 flex-wrap">

            <a href="{{ route('admin.reports.books.pdf') }}"
               class="btn btn-primary rounded-pill px-4">

                <i class="fa fa-book me-1"></i>
                Export Buku

            </a>

            <a href="{{ route('admin.reports.categories.pdf') }}"
               class="btn btn-success rounded-pill px-4">

                <i class="fa fa-layer-group me-1"></i>
                Export Kategori

            </a>

        </div>

            <a href="{{ route('admin.reports.visitors.pdf') }}"
               class="btn btn-dark rounded-pill px-4">

                <i class="fa fa-eye me-1"></i>
                Export Pengunjung

            </a>

    </div>

    {{-- STATISTIK --}}
    <div class="row g-4 mb-4">

        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4 d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Total Buku
                        </small>

                        <h2 class="fw-bold mb-0 mt-2">
                            {{ $totalBooks }}
                        </h2>

                    </div>

                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                         style="width:55px;height:55px;">

                        <i class="fa fa-book"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4 d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Total Kategori
                        </small>

                        <h2 class="fw-bold mb-0 mt-2">
                            {{ $totalCategories }}
                        </h2>

                    </div>

                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                         style="width:55px;height:55px;">

                        <i class="fa fa-layer-group"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4 d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Total Bookmark
                        </small>

                        <h2 class="fw-bold mb-0 mt-2">
                            {{ $totalBookmarks }}
                        </h2>

                    </div>

                    <div class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center"
                         style="width:55px;height:55px;">

                        <i class="fa fa-star"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 h-100">

                <div class="card-body p-4 d-flex justify-content-between align-items-center">

                    <div>

                        <small class="text-muted">
                            Total Komentar
                        </small>

                        <h2 class="fw-bold mb-0 mt-2">
                            {{ $totalComments }}
                        </h2>

                    </div>

                    <div class="bg-dark text-white rounded-circle d-flex align-items-center justify-content-center"
                         style="width:55px;height:55px;">

                        <i class="fa fa-comments"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- RINGKASAN --}}
    <div class="card border-0 shadow-sm rounded-4 mb-4">

        <div class="card-body p-4">

            <h4 class="fw-bold mb-4">
                📋 Ringkasan Sistem
            </h4>

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>
                            <th>Data</th>
                            <th>Total</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>
                            <td>Total Buku</td>
                            <td><span class="badge bg-primary rounded-pill px-3 py-2">{{ $totalBooks }}</span></td>
                        </tr>

                        <tr>
                            <td>Total Kategori</td>
                            <td><span class="badge bg-success rounded-pill px-3 py-2">{{ $totalCategories }}</span></td>
                        </tr>

                        <tr>
                            <td>Total Bookmark</td>
                            <td><span class="badge bg-warning text-dark rounded-pill px-3 py-2">{{ $totalBookmarks }}</span></td>
                        </tr>

                        <tr>
                            <td>Total Komentar</td>
                            <td><span class="badge bg-dark rounded-pill px-3 py-2">{{ $totalComments }}</span></td>
                        </tr>

                        <tr>
                            <td>Total Riwayat Baca</td>
                            <td><span class="badge bg-info rounded-pill px-3 py-2">{{ $totalHistories }}</span></td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    {{-- BUKU POPULER --}}
<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body p-4">

        <h4 class="fw-bold mb-4">
            🔥 Buku Paling Populer
        </h4>

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>
                        <th width="70">No</th>
                        <th>Judul Buku</th>
                        <th>Total Dibaca</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($popularBooks as $book)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            <span class="fw-semibold">
                                {{ $book->title ?? '-' }}
                            </span>
                        </td>

                        <td>
                            <span class="badge bg-danger rounded-pill px-3 py-2">
                                {{ $book->read_histories_count ?? 0 }} kali
                            </span>
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="3"
                            class="text-center py-5">

                            <div style="font-size:55px;">
                                📊
                            </div>

                            <h5 class="fw-bold mt-3">
                                Belum Ada Data Populer
                            </h5>

                            <p class="text-muted mb-0">
                                Data buku populer akan muncul setelah ada riwayat baca.
                            </p>

                        </td>
                    </tr>

                    @endforelse

                </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection