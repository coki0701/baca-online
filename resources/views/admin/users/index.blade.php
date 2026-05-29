@extends('admin.layouts.app')

@section('title', 'Pengguna')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h2 class="fw-bold mb-1">
            👥 Data Pengguna
        </h2>

        <p class="text-muted mb-0">
            Kelola akun admin dan pengguna yang terdaftar.
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

                            <th>Pengguna</th>

                            <th>Email</th>

                            <th>Role</th>

                            <th width="180" class="text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($users as $user)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>

                                <div class="d-flex align-items-center gap-3">

                                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                                         style="width:45px;height:45px;font-weight:bold;">

                                        {{ strtoupper(substr($user->name, 0, 1)) }}

                                    </div>

                                    <div>

                                        <h6 class="fw-bold mb-0">

                                            {{ $user->name }}

                                        </h6>

                                        <small class="text-muted">

                                            Terdaftar

                                        </small>

                                    </div>

                                </div>

                            </td>

                            <td>
                                {{ $user->email }}
                            </td>

                            <td>

                                @if($user->role == 'admin')

                                    <span class="badge bg-dark rounded-pill px-3 py-2">
                                        Admin
                                    </span>

                                @else

                                    <span class="badge bg-primary rounded-pill px-3 py-2">
                                        User
                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                       class="btn btn-warning btn-sm rounded-pill">

                                        <i class="fa fa-edit"></i>

                                    </a>

                                    <form action="{{ route('admin.users.destroy', $user->id) }}"
                                          method="POST">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm rounded-pill"
                                                onclick="return confirm('Yakin hapus user ini?')">

                                            <i class="fa fa-trash"></i>

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center py-5">

                                <div style="font-size:55px;">
                                    👥
                                </div>

                                <h5 class="fw-bold mt-3">
                                    Belum Ada User
                                </h5>

                                <p class="text-muted mb-0">
                                    Data pengguna akan muncul di sini.
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