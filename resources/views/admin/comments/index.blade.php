@extends('admin.layouts.app')

@section('title', 'Komentar')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            💬 Komentar Pengguna
        </h2>

        <p class="text-muted mb-0">
            Pantau dan kelola komentar pembaca pada buku digital.
        </p>

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

                            <th>User</th>

                            <th>Buku</th>

                            <th>Komentar</th>

                            <th>Tanggal</th>

                            <th width="120" class="text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($comments as $comment)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <div class="d-flex align-items-center gap-3">

                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                         style="width:45px;height:45px;font-weight:bold;">

                                        {{ strtoupper(substr($comment->guest_name ?? 'P', 0, 1)) }}

                                    </div>

                                    <div>

                                        <h6 class="fw-bold mb-0">

                                            {{ strtoupper(substr($comment->guest_name ?? $comment->user->name ?? 'P', 0, 1)) }}

                                        </h6>

                                        <small class="text-muted">

                                            Pembaca

                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>

                                <span class="fw-semibold">

                                    {{ $comment->book->title ?? 'Buku tidak ditemukan' }}

                                </span>

                            </td>

                            <td>

                                <div class="text-muted"
                                     style="max-width:420px;">

                                    {{ Str::limit($comment->comment, 120) }}

                                </div>

                            </td>

                            <td>

                                <span class="badge bg-light text-dark rounded-pill px-3 py-2">

                                    {{ $comment->created_at->format('d M Y') }}

                                </span>

                            </td>

                            <td class="text-center">

                                <form action="{{ route('admin.comments.destroy', $comment->id) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm rounded-pill"
                                            onclick="return confirm('Hapus komentar ini?')">

                                        <i class="fa fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center py-5">

                                <div style="font-size:55px;">
                                    💬
                                </div>

                                <h5 class="fw-bold mt-3">
                                    Belum Ada Komentar
                                </h5>

                                <p class="text-muted mb-0">
                                    Komentar dari pembaca akan muncul di sini.
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