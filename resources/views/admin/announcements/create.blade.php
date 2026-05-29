@extends('admin.layouts.app')

@section('title', 'Tambah Pengumuman')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h2 class="fw-bold mb-1">
                📢 Tambah Pengumuman
            </h2>

            <p class="text-muted mb-0">
                Buat informasi baru untuk ditampilkan di landing page.
            </p>

        </div>

        <a href="{{ route('admin.announcements') }}"
           class="btn btn-secondary rounded-pill px-4">

            Kembali

        </a>

    </div>

    {{-- VALIDATION ERROR --}}
    @if($errors->any())

        <div class="alert alert-danger border-0 shadow-sm rounded-4">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    {{-- FORM --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('admin.announcements.store') }}"
                  method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Judul Pengumuman
                    </label>

                    <input type="text"
                           name="title"
                           class="form-control rounded-4 py-3"
                           placeholder="Masukkan judul pengumuman">

                </div>

                <div class="mb-4">

                    <label class="form-label fw-semibold">
                        Isi Pengumuman
                    </label>

                    <textarea name="content"
                              rows="7"
                              class="form-control rounded-4"
                              placeholder="Tulis isi pengumuman..."></textarea>

                </div>

                <button class="btn btn-primary rounded-pill px-5 py-3">

                    💾 Simpan Pengumuman

                </button>

            </form>

        </div>

    </div>

</div>

@endsection