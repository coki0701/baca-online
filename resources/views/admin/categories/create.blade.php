@extends('admin.layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                ➕ Tambah Kategori
            </h2>

            <p class="text-muted mb-0">
                Tambahkan kategori baru untuk buku digital.
            </p>

        </div>

        <a href="{{ route('admin.categories.index') }}"
           class="btn btn-secondary rounded-pill px-4">

            Kembali

        </a>

    </div>

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('admin.categories.store') }}"
                  method="POST">

                @csrf

                <div class="mb-4">

                    <label class="form-label fw-semibold">

                        Nama Kategori

                    </label>

                    <input type="text"
                           name="name"
                           class="form-control rounded-4 py-3"
                           placeholder="Masukkan nama kategori">

                </div>

                <button class="btn btn-primary rounded-pill px-5 py-3">

                    💾 Simpan Kategori

                </button>

            </form>

        </div>

    </div>

</div>

@endsection