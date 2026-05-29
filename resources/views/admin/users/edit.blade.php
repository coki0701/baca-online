@extends('admin.layouts.app')

@section('title', 'Edit User')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>

            <h2 class="fw-bold mb-1">
                ✏️ Edit User
            </h2>

            <p class="text-muted mb-0">
                Perbarui nama, email, dan role pengguna.
            </p>

        </div>

        <a href="{{ route('admin.users.index') }}"
           class="btn btn-secondary rounded-pill px-4">

            Kembali

        </a>

    </div>

    {{-- FORM --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <form action="{{ route('admin.users.update', $user->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="row g-4">

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Nama
                        </label>

                        <input type="text"
                               name="name"
                               value="{{ $user->name }}"
                               class="form-control rounded-4 py-3">

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               value="{{ $user->email }}"
                               class="form-control rounded-4 py-3">

                    </div>

                    <div class="col-md-6">

                        <label class="form-label fw-semibold">
                            Role
                        </label>

                        <select name="role"
                                class="form-select rounded-4 py-3">

                            <option value="admin"
                                {{ $user->role == 'admin' ? 'selected' : '' }}>

                                Admin

                            </option>

                            <option value="user"
                                {{ $user->role == 'user' ? 'selected' : '' }}>

                                User

                            </option>

                        </select>

                    </div>

                    <div class="col-12">

                        <button class="btn btn-success rounded-pill px-5 py-3">

                            ✅ Update User

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection