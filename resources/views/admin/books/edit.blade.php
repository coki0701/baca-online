@extends('admin.layouts.app')

@section('title', 'Edit Buku')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
        <div>
            <h2 class="fw-bold mb-1">✏️ Edit Buku</h2>
            <p class="text-muted mb-0">Perbarui data buku digital.</p>
        </div>

        <a href="{{ route('admin.books.index') }}"
           class="btn btn-secondary rounded-pill px-4">
            Kembali
        </a>
    </div>

    @if($errors->any())
        <div class="alert alert-danger border-0 shadow-sm rounded-4">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <form action="{{ route('admin.books.update', $book->id) }}"
                  method="POST"
                  enctype="multipart/form-data"
                  class="loading-form">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Judul Buku</label>
                        <input type="text" name="title" value="{{ $book->title }}" class="form-control rounded-4 py-3">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Penulis</label>
                        <input type="text" name="author" value="{{ $book->author }}" class="form-control rounded-4 py-3">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Tahun</label>
                        <input type="number" name="year" value="{{ $book->year }}" class="form-control rounded-4 py-3">
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Kategori</label>
                        <select name="category_id" class="form-select rounded-4 py-3">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $book->category_id == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="description" rows="5" class="form-control rounded-4">{{ $book->description }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Cover Buku</label>
                        <input type="file"
                                accept=".jpg,.jpeg,.png" 
                                name="cover" 
                                class="form-control rounded-4 py-3"
                                id="coverInput">>

                        @if($book->cover)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $book->cover) }}"
                                    id="coverPreview"
                                    width="120"
                                    class="rounded-4 shadow-sm">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">File PDF</label>
                        <input type="file" 
                                name="file"
                                accept=".pdf" 
                                class="form-control rounded-4 py-3">
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti PDF.</small>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-success rounded-pill px-5 py-3">
                            ✅ Update Buku
                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>

</div>
<script>

/* =========================
   PREVIEW COVER
========================= */

const coverInput =
    document.getElementById('coverInput');

const coverPreview =
    document.getElementById('coverPreview');

if(coverInput){

    coverInput.addEventListener('change', function(e){

        const file =
            e.target.files[0];

        if(file){

            coverPreview.src =
                URL.createObjectURL(file);

            coverPreview.classList.remove('d-none');

        }

    });

}

</script>

@endsection