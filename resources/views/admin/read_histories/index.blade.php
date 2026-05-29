@extends('admin.layouts.app')

@section('title', 'Riwayat Membaca')

@section('content')

<div class="container-fluid">

    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            📚 Riwayat Membaca
        </h2>

        <p class="text-muted mb-0">
            Pantau aktivitas buku yang dibaca oleh pengunjung.
        </p>

    </div>

    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm rounded-4">
            {{ session('success') }}
        </div>

    @endif

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>
                        <tr>
                            <th width="60">No</th>
                            <th>Pengunjung</th>
                            <th>Buku</th>
                            <th>Tanggal Dibaca</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($histories as $history)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <div class="d-flex align-items-center gap-3">

                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                         style="width:45px;height:45px;font-weight:bold;">

                                        P

                                    </div>

                                    <div>

                                        <h6 class="fw-bold mb-0">
                                            Pengunjung
                                        </h6>

                                        <small class="text-muted">
                                            Pembaca
                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>
                                <span class="fw-semibold">
                                    {{ $history->book->title ?? 'Buku tidak ditemukan' }}
                                </span>
                            </td>

                            <td>
                                <span class="badge bg-light text-dark rounded-pill px-3 py-2">
                                    {{ $history->updated_at->format('d M Y H:i') }}
                                </span>
                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="4"
                                class="text-center py-5">

                                <div style="font-size:55px;">
                                    📖
                                </div>

                                <h5 class="fw-bold mt-3">
                                    Belum Ada Riwayat
                                </h5>

                                <p class="text-muted mb-0">
                                    Aktivitas membaca akan muncul di sini.
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