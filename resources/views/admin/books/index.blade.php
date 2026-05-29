@extends('admin.layouts.app')

@section('title', 'Data Buku')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h2 class="fw-bold mb-1">
                📚 Data Buku
            </h2>

            <p class="text-muted mb-0">
                Kelola koleksi buku digital yang tampil di landing page.
            </p>

        </div>

        <a href="{{ route('admin.books.create') }}"
           class="btn btn-primary rounded-pill px-4">

            <i class="fa fa-plus me-1"></i>
            Tambah Buku

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

    {{-- SEARCH --}}
    <div class="mb-4">

        <input type="text"
               id="searchBook"
               class="form-control rounded-4 py-3"
               placeholder="🔍 Cari judul buku, penulis, kategori, atau tahun...">

    </div>

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>

                <tr>
                    <th width="60">No</th>
                    <th>Cover</th>
                    <th>Informasi Buku</th>
                    <th>Kategori</th>
                    <th>Tahun</th>
                    <th width="190" class="text-center">Aksi</th>
                </tr>

            </thead>

            <tbody id="bookTable">

                @forelse($books as $book)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if($book->cover)

                            <img src="{{ asset('storage/' . $book->cover) }}"
                                 width="70"
                                 height="95"
                                 class="rounded-4 shadow-sm"
                                 style="object-fit:cover;">

                        @else

                            <div class="bg-light rounded-4 d-flex align-items-center justify-content-center"
                                 style="width:70px;height:95px;">

                                <i class="fa fa-book text-muted"></i>

                            </div>

                        @endif
                    </td>

                    <td>
                        <h6 class="fw-bold mb-1">
                            {{ $book->title }}
                        </h6>

                        <small class="text-muted">
                            ✍ {{ $book->author }}
                        </small>
                    </td>

                    <td>
                        <span class="badge bg-primary rounded-pill px-3 py-2">
                            {{ $book->category->name ?? 'Tanpa Kategori' }}
                        </span>
                    </td>

                    <td>
                        <span class="text-muted">
                            {{ $book->year ?? '-' }}
                        </span>
                    </td>

                    <td class="text-center">

                        <div class="d-flex justify-content-center gap-2">

                            <a href="{{ route('admin.books.edit', $book->id) }}"
                               class="btn btn-warning btn-sm rounded-pill">

                                <i class="fa fa-edit"></i>

                            </a>

                            <form action="{{ route('admin.books.destroy', $book->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm rounded-pill"
                                        onclick="return confirm('Yakin hapus buku ini?')">

                                    <i class="fa fa-trash"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="6" class="text-center py-5">

                        <div style="font-size:55px;">
                            📚
                        </div>

                        <h5 class="fw-bold mt-3">
                            Belum Ada Buku
                        </h5>

                        <p class="text-muted mb-0">
                            Tambahkan buku pertama untuk mulai mengisi perpustakaan digital.
                        </p>

                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

<script>
    const searchBook = document.getElementById('searchBook');
    const bookRows = document.querySelectorAll('#bookTable tr');

    if(searchBook){

        searchBook.addEventListener('keyup', function(){

            let keyword = this.value.toLowerCase();

            bookRows.forEach(function(row){

                let text = row.innerText.toLowerCase();

                row.style.display = text.includes(keyword) ? '' : 'none';

            });

        });

    }
</script>

    </div>

</div>

@endsection