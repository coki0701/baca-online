@extends('admin.layouts.app')

@section('title', 'Pengaturan Website')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4">

        <div class="card-body p-5 text-white"
             style="background: linear-gradient(135deg,#2563eb,#1d4ed8);">

            <div class="row align-items-center">

                <div class="col-lg-8">

                    <h1 class="fw-bold mb-3">

                        ⚙ Pengaturan Website

                    </h1>

                    <p class="mb-0 fs-5 text-light">

                        Kelola identitas website,
                        kontak perpustakaan digital,
                        dan tampilan landing page.

                    </p>

                </div>

                <div class="col-lg-4 text-center d-none d-lg-block">

                    <div style="font-size:110px;">
                        🌐
                    </div>

                </div>

            </div>

        </div>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success border-0 shadow-sm rounded-4">

            {{ session('success') }}

        </div>

    @endif

    {{-- FORM --}}
    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4 p-lg-5">

            <form action="{{ route('admin.settings.update') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row g-4">

                    {{-- NAMA WEBSITE --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">

                            Nama Website

                        </label>

                        <input type="text"
                               name="site_name"
                               class="form-control rounded-4 py-3"
                               value="{{ $setting->site_name ?? '' }}"
                               placeholder="Masukkan nama website">

                    </div>

                    {{-- EMAIL --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">

                            Email Website

                        </label>

                        <input type="email"
                               name="email"
                               class="form-control rounded-4 py-3"
                               value="{{ $setting->email ?? '' }}"
                               placeholder="contoh@email.com">

                    </div>

                    {{-- TELEPON --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">

                            Nomor Telepon

                        </label>

                        <input type="text"
                               name="phone"
                               class="form-control rounded-4 py-3"
                               value="{{ $setting->phone ?? '' }}"
                               placeholder="+62 812 xxxx xxxx">

                    </div>

                    {{-- JAM BUKA --}}
                    <div class="col-md-6">

                        <label class="form-label fw-semibold">

                            Jam Operasional

                        </label>

                        <input type="text"
                               name="open_hours"
                               class="form-control rounded-4 py-3"
                               value="{{ $setting->open_hours ?? '' }}"
                               placeholder="Senin - Jumat | 08.00 - 16.00">

                    </div>

                    {{-- ALAMAT --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">

                            Alamat Website / Perpustakaan

                        </label>

                        <textarea name="address"
                                  rows="4"
                                  class="form-control rounded-4"
                                  placeholder="Masukkan alamat lengkap">{{ $setting->address ?? '' }}</textarea>

                    </div>

                    {{-- DESKRIPSI --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">

                            Deskripsi Website

                        </label>

                        <textarea name="description"
                                  rows="5"
                                  class="form-control rounded-4"
                                  placeholder="Deskripsi singkat website">{{ $setting->description ?? '' }}</textarea>

                    </div>


                    {{-- LOGO --}}
                    <div class="col-12">

                        <label class="form-label fw-semibold">

                            Logo Website

                        </label>

                        <input type="file"
                               name="logo"
                               class="form-control rounded-4 py-3">

                    </div>

                    {{-- PREVIEW --}}
                    @if(!empty($setting->logo))

                    <div class="col-12">

                        <div class="card border-0 bg-light rounded-4 p-4 text-center">

                            <h6 class="fw-bold mb-4">

                                Preview Logo Website

                            </h6>

                            <img src="{{ asset('storage/'.$setting->logo) }}"
                                 width="140"
                                 class="mx-auto rounded-4 shadow-sm">

                        </div>

                    </div>

                    @endif

                    {{-- BUTTON --}}
                    <div class="col-12">

                        <button type="submit"
                                class="btn btn-primary rounded-pill px-5 py-3">

                            💾 Simpan Pengaturan

                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection