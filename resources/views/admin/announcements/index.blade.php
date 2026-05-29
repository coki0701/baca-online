@extends('admin.layouts.app')

@section('title', 'Pengumuman')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h2 class="fw-bold mb-1">
                📢 Pengumuman
            </h2>

            <p class="text-muted mb-0">
                Kelola informasi yang tampil di halaman landing page.
            </p>

        </div>

        <a href="{{ route('admin.announcements.create') }}"
           class="btn btn-primary rounded-pill px-4">

            <i class="fa fa-plus me-1"></i>
            Tambah Pengumuman

        </a>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm rounded-4">

            {{ session('success') }}

        </div>

    @endif

    {{-- TABLE --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th width="60">No</th>

                            <th>Pengumuman</th>

                            <th>Isi</th>

                            <th>Tanggal</th>

                            <th width="120" class="text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($announcements as $announcement)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <div class="d-flex align-items-center gap-3">

                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                         style="width:45px;height:45px;">

                                        <i class="fa fa-bullhorn"></i>

                                    </div>

                                    <div>

                                        <h6 class="fw-bold mb-0">

                                            {{ $announcement->title }}

                                        </h6>

                                        <small class="text-muted">

                                            Informasi website

                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>

                                <div class="text-muted"
                                     style="max-width:520px;">

                                    {{ Str::limit($announcement->content, 120) }}

                                </div>

                            </td>

                            <td>

                                <span class="badge bg-light text-dark rounded-pill px-3 py-2">

                                    {{ $announcement->created_at->format('d M Y') }}

                                </span>

                            </td>

                            <td class="text-center">

                                <form action="{{ route('admin.announcements.destroy', $announcement->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm rounded-pill"
                                            onclick="return confirm('Hapus pengumuman ini?')">

                                        <i class="fa fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-5">

                                <div style="font-size:55px;">
                                    📢
                                </div>

                                <h5 class="fw-bold mt-3">
                                    Belum Ada Pengumuman
                                </h5>

                                <p class="text-muted mb-0">
                                    Tambahkan pengumuman pertama untuk landing page.
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