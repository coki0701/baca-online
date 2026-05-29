@extends('admin.layouts.app')

@section('title', 'Profile Admin')

@section('content')

<div class="container-fluid">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-5">

                    <div class="text-center mb-5">

                        <div class="mx-auto mb-3
                                    d-flex align-items-center
                                    justify-content-center
                                    rounded-circle bg-primary text-white"
                             style="width:90px;height:90px;font-size:36px;">

                            {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                        </div>

                        <h3 class="fw-bold">

                            {{ Auth::user()->name }}

                        </h3>

                        <p class="text-muted mb-0">

                            Administrator

                        </p>

                    </div>

                    {{-- SUCCESS --}}
                    @if(session('success'))

                        <div class="alert alert-success rounded-4">

                            {{ session('success') }}

                        </div>

                    @endif

                    {{-- FORM --}}
                    <form action="{{ route('admin.profile.update') }}"
                          method="POST"
                          class="loading-form">

                        @csrf

                        {{-- NAME --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Nama

                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ Auth::user()->name }}"
                                   class="form-control rounded-4 py-3">

                        </div>

                        {{-- EMAIL --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Email

                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ Auth::user()->email }}"
                                   class="form-control rounded-4 py-3">

                        </div>

                        {{-- PASSWORD --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Password Baru

                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control rounded-4 py-3">

                            <small class="text-muted">

                                Kosongkan jika tidak ingin mengganti password.

                            </small>

                        </div>

                        <button class="btn btn-primary rounded-pill px-5 py-3">

                            💾 Update Profile

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection