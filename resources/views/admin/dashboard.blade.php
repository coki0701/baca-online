@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            Dashboard Admin
        </h2>

        <p class="text-muted mb-0">
            Selamat datang di panel admin perpustakaan digital.
        </p>

    </div>

    {{-- STATISTIK --}}
    <div class="row g-4 mb-4">

        {{-- TOTAL BUKU --}}
        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 bg-primary text-white h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="opacity-75">
                                Total Buku
                            </small>

                            <h2 class="fw-bold mt-2 mb-0">
                                {{ $totalBooks }}
                            </h2>

                        </div>

                        <i class="fa fa-book fa-2x opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- TOTAL USER --}}
        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 bg-success text-white h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="opacity-75">
                                Total User
                            </small>

                            <h2 class="fw-bold mt-2 mb-0">
                                {{ $totalUsers }}
                            </h2>

                        </div>

                        <i class="fa fa-users fa-2x opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- TOTAL KATEGORI --}}
        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 bg-warning text-dark h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="opacity-75">
                                Total Kategori
                            </small>

                            <h2 class="fw-bold mt-2 mb-0">
                                {{ $totalCategories }}
                            </h2>

                        </div>

                        <i class="fa fa-layer-group fa-2x opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

        {{-- TOTAL KOMENTAR --}}
        <div class="col-lg-3 col-md-6">

            <div class="card border-0 shadow-sm rounded-4 bg-dark text-white h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="opacity-75">
                                Total Komentar
                            </small>

                            <h2 class="fw-bold mt-2 mb-0">
                                {{ $totalComments }}
                            </h2>

                        </div>

                        <i class="fa fa-comments fa-2x opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- PENGUNJUNG --}}
    <div class="row g-4 mb-4">

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 bg-info text-white h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="opacity-75">
                                Total Pengunjung
                            </small>

                            <h2 class="fw-bold mt-2 mb-0">
                                {{ $totalVisitors }}
                            </h2>

                        </div>

                        <i class="fa fa-eye fa-2x opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 bg-secondary text-white h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="opacity-75">
                                Pengunjung Hari Ini
                            </small>

                            <h2 class="fw-bold mt-2 mb-0">
                                {{ $todayVisitors }}
                            </h2>

                        </div>

                        <i class="fa fa-calendar-day fa-2x opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-lg-4">

            <div class="card border-0 shadow-sm rounded-4 bg-danger text-white h-100">

                <div class="card-body p-4">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="opacity-75">
                                Pengunjung Bulan Ini
                            </small>

                            <h2 class="fw-bold mt-2 mb-0">
                                {{ $monthlyVisitors }}
                            </h2>

                        </div>

                        <i class="fa fa-chart-line fa-2x opacity-50"></i>

                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- INFORMASI --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-5">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <h3 class="fw-bold mb-3">
                        👋 Selamat Datang Admin
                    </h3>

                    <p class="text-muted mb-4">

                        Sistem perpustakaan digital berjalan dengan baik.
                        Anda dapat mengelola buku, kategori, komentar,
                        pengunjung, dan pengaturan website melalui dashboard ini.

                    </p>

                    <div class="d-flex flex-wrap gap-3">

                        <a href="{{ route('admin.books.index') }}"
                           class="btn btn-primary rounded-pill px-4">

                            📚 Kelola Buku

                        </a>

                        <a href="{{ route('admin.categories.index') }}"
                           class="btn btn-dark rounded-pill px-4">

                            📂 Kelola Kategori

                        </a>

                    </div>

                </div>

                <div class="col-lg-4 text-center d-none d-lg-block">

                    <div style="font-size:130px;">
                        📖
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection