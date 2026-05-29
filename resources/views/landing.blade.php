<!DOCTYPE html>
<html lang="en">

<head>

   <meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

{{-- SEO --}}
<title>
    {{ $setting->site_name ?? 'Sahabat Literasi' }}
</title>

<meta name="description"
      content="{{ $setting->description ?? 'Platform baca buku digital modern dan responsif.' }}">

<meta name="keywords"
      content="perpustakaan digital, baca buku online, ebook, literasi">

<meta name="author"
      content="{{ $setting->site_name ?? 'Sahabat Literasi' }}">

{{-- FAVICON --}}
@if(!empty($setting->logo))
<link rel="icon"
      type="image/png"
      href="{{ asset('storage/'.$setting->logo) }}">
@else
<link rel="icon"
      href="{{ asset('images/logowebasli.png') }}">
@endif

{{-- BOOTSTRAP --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet">

{{-- FONT AWESOME --}}
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

{{-- GOOGLE FONT --}}
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet">
    <style>

        /* =========================
   GLOBAL
========================= */
body{
    background:#f1f5f9;
    font-family:'Inter', sans-serif;
    color:#0f172a;
    scroll-behavior:smooth;
}

a{
    text-decoration:none;
}


/* =========================
   NAVBAR
========================= */
.custom-navbar{
    position:sticky;
    top:0;
    z-index:999;
    background:#ffffff !important;
    border-bottom:1px solid #e5e7eb;
    padding:18px 0;
    transition:transform 0.4s ease;
}

.custom-navbar.hide-navbar{
    transform:translateY(-120%);
}

.custom-navbar .container{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.navbar-brand{
    font-size:22px;
    font-weight:800;
    color:#111827 !important;
    display:flex;
    align-items:center;
    gap:10px;
}

.navbar-brand img{
    width:58px;
    height:auto;
    object-fit:contain;
}

.nav-menu{
    display:flex;
    align-items:center;
    gap:26px;
}

.nav-menu a{
    color:#111827 !important;
    font-weight:700;
    transition:0.3s;
}

.nav-menu a:hover{
    color:#0066d9 !important;
}

.menu-toggle{
    border:none;
    background:none;
    font-size:24px;
    display:none;
    color:#111827;
}


/* =========================
   HERO SAHABAT LITERASI
========================= */
.hero{
    background:
        radial-gradient(circle at 76% 34%, #ffd400 0 6%, transparent 7%),
        radial-gradient(circle at 63% 42%, #0066d9 0 5%, transparent 6%),
        linear-gradient(135deg,#ffffff 0%,#eef6ff 45%,#dbeafe 100%);
    color:#111827;
    padding:120px 0 150px;
    position:relative;
    overflow:hidden;
    border-radius:0;
}

.hero::before{
    content:'';
    position:absolute;
    left:-180px;
    top:-170px;
    width:520px;
    height:520px;
    background:#ffd400;
    border-radius:50%;
    z-index:0;
}

.hero::after{
    content:'';
    position:absolute;
    right:-120px;
    bottom:-180px;
    width:620px;
    height:360px;
    background:#0066d9;
    border-radius:55% 45% 0 0;
    z-index:0;
}

.hero .container{
    position:relative;
    z-index:2;
}

.hero h1{
    font-size:56px;
    font-weight:800;
    color:#0f172a !important;
    line-height:1.15;
}

.hero h1 span{
    color:#0066d9 !important;
}

.hero p{
    font-size:18px;
    color:#475569 !important;
    max-width:560px;
    line-height:1.7;
}

.hero-badge{
    background:white;
    color:#0066d9;
    border-radius:50px;
    padding:14px 28px;
    display:inline-block;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    font-weight:700;
}

.hero-logo{
    width:520px;
    opacity:1;
    filter:drop-shadow(0 20px 35px rgba(0,102,217,.25));
}

.btn-hero{
    background:#ffd400;
    color:#111827 !important;
    border:none;
    font-weight:800;
    padding:14px 34px;
    border-radius:50px;
    box-shadow:0 12px 25px rgba(255,212,0,.35);
}

.btn-hero:hover{
    background:#facc15;
    color:#111827 !important;
}


/* =========================
   SEARCH BOX
========================= */
.search-box{
    background:white;
    padding:25px;
    border-radius:20px;
    margin-top:-40px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    position:relative;
    z-index:5;
}


/* =========================
   SECTION TITLE
========================= */
.section-title{
    font-weight:800;
    margin-bottom:25px;
}


/* =========================
   BOOK CARD
========================= */
.book-card{
    border:none;
    border-radius:20px;
    overflow:hidden;
    transition:all 0.35s ease;
    background:white;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
    height:100%;
    position:relative;
}

.book-card:hover{
    transform:translateY(-10px) scale(1.02);
    box-shadow:0 20px 40px rgba(37,99,235,0.15);
}

.book-cover{
    height:260px;
    object-fit:cover;
}


/* =========================
   CATEGORY
========================= */
.category-card{
    background:white;
    border-radius:20px;
    padding:25px;
    text-align:center;
    transition:all 0.3s ease;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
    cursor:pointer;
    height:100%;
}

.category-card i{
    font-size:30px;
    margin-bottom:15px;
    color:#0066d9;
    transition:0.3s;
}

.category-card:hover{
    transform:translateY(-8px);
    background:#0066d9;
    color:white;
    box-shadow:0 15px 30px rgba(0,102,217,0.25);
}

.category-card:hover i,
.category-card:hover small,
.category-card:hover h5{
    color:white !important;
}

.category-slider{
    scroll-behavior:smooth;
}

.category-slider::-webkit-scrollbar{
    height:8px;
}

.category-slider::-webkit-scrollbar-thumb{
    background:#cbd5e1;
    border-radius:20px;
}


/* =========================
   STATISTIC
========================= */
.stats-card,
.stats-box{
    background:white;
    border-radius:24px;
    padding:35px;
    text-align:center;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
    transition:0.3s;
    height:100%;
}

.stats-box:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(37,99,235,0.15);
}

.stats-number{
    font-size:42px;
    font-weight:800;
    color:#0066d9;
    margin-bottom:10px;
}


/* =========================
   FEATURE SECTION
========================= */
.why-section{
    background:#f8fafc;
}

.feature-box{
    background:white;
    border-radius:24px;
    padding:35px;
    text-align:center;
    transition:all 0.35s ease;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
    height:100%;
}

.feature-box:hover{
    transform:translateY(-10px);
    box-shadow:0 20px 40px rgba(37,99,235,0.15);
}

.feature-icon{
    width:80px;
    height:80px;
    margin:auto;
    border-radius:50%;
    background:#eff6ff;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:30px;
    color:#0066d9;
}


/* =========================
   ANNOUNCEMENT
========================= */
.announcement-card{
    background:white;
    border-radius:24px;
    padding:30px;
    height:100%;
    transition:0.3s;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
}

.announcement-card:hover{
    transform:translateY(-8px);
    box-shadow:0 20px 40px rgba(37,99,235,0.15);
}


/* =========================
   FOOTER
========================= */
footer{
    background:#0f172a;
    color:white;
    padding-top:70px;
    margin-top:100px;
    border-top-left-radius:40px;
    border-top-right-radius:40px;
}

.footer-link{
    color:rgba(255,255,255,0.7);
    text-decoration:none;
    transition:0.3s;
}

.footer-link:hover{
    color:white;
    padding-left:5px;
}

.footer-icon{
    width:38px;
    height:38px;
    border-radius:50%;
    background:rgba(255,255,255,0.1);
    display:flex;
    align-items:center;
    justify-content:center;
    transition:0.3s;
}

.footer-icon:hover{
    background:#0066d9;
    transform:translateY(-3px);
}


/* =========================
   BUTTON
========================= */
.btn-primary{
    background:#ffd400;
    color:#111827 !important;
    border:none;
    border-radius:16px;
    padding:10px 22px;
    font-weight:800;
    transition:all 0.25s ease;
}

.btn-primary:hover{
    background:#facc15;
    color:#111827 !important;
}


/* =========================
   DARK MODE
========================= */
.dark-mode .section-title{
    color:#f8fafc !important;
}

.dark-mode .section-subtitle{
    color:#cbd5e1 !important;
}

.dark-mode .why-section h1,
.dark-mode .why-section h2,
.dark-mode .why-section h3,
.dark-mode .why-section h4,
.dark-mode .why-section h5{
    color:#f8fafc !important;
}

.dark-mode .why-section p{
    color:#cbd5e1 !important;
}

.dark-mode{
    background:#0f172a !important;
    color:#f8fafc !important;
}

.dark-mode .custom-navbar,
.dark-mode .hero{
    background:#ffffff !important;
}

.dark-mode .navbar-brand,
.dark-mode .nav-menu a,
.dark-mode .menu-toggle,
.dark-mode .hero h1{
    color:#111827 !important;
}

.dark-mode .hero h1 span{
    color:#0066d9 !important;
}

.dark-mode .hero p{
    color:#475569 !important;
}

.dark-mode .book-card,
.dark-mode .stats-card,
.dark-mode .stats-box,
.dark-mode .category-card,
.dark-mode .search-box,
.dark-mode .feature-box,
.dark-mode .announcement-card{
    background:#1e293b !important;
    color:white !important;
}

.dark-mode .text-muted,
.dark-mode .feature-box p{
    color:#cbd5e1 !important;
}

.dark-mode footer{
    background:#020617 !important;
}


/* =========================
   RESPONSIVE MOBILE
========================= */
@media(max-width:991px){

    .menu-toggle{
        display:block;
    }

    .nav-menu{
        position:absolute;
        top:85px;
        left:20px;
        right:20px;
        background:white;
        border-radius:20px;
        padding:20px;
        display:none;
        flex-direction:column;
        gap:15px;
        box-shadow:0 10px 30px rgba(0,0,0,0.08);
    }

    .nav-menu.active{
        display:flex;
    }

}

@media(max-width:768px){

    .hero{
        padding:80px 0 100px;
        text-align:center;
    }

    .hero h1{
        font-size:38px;
    }

    .hero-logo{
        width:280px !important;
        margin-top:30px;
    }

    .search-box{
        margin-top:-20px;
    }

}

/* FIX DARK MODE WHY SECTION */
.dark-mode .why-section{
    background:#0f172a !important;
}

.dark-mode .why-section .section-title,
.dark-mode .why-section h2{
    color:#ffffff !important;
}

.dark-mode .why-section .section-subtitle,
.dark-mode .why-section p{
    color:#cbd5e1 !important;
}

.dark-mode .why-section .feature-box h4{
    color:#ffffff !important;
}

.dark-mode .why-section .feature-box p{
    color:#cbd5e1 !important;
}

/* =========================
   SCROLL ANIMATION
========================= */
.fade-up{
    opacity:0;
    transform:translateY(40px);
    transition:all 0.8s ease;
}

.fade-up.show{
    opacity:1;
    transform:translateY(0);
}

/* =========================
   TOAST NOTIFICATION
========================= */
.custom-toast{
    position:fixed;
    top:25px;
    right:25px;
    background:white;
    padding:16px 22px;
    border-radius:18px;
    box-shadow:0 10px 30px rgba(0,0,0,0.12);
    z-index:9999;
    min-width:320px;
    animation:toastShow .4s ease;
}

.toast-icon{
    width:38px;
    height:38px;
    border-radius:50%;
    background:#22c55e;
    color:white;
    display:flex;
    align-items:center;
    justify-content:center;
    font-weight:bold;
}

.dark-mode .custom-toast{
    background:#1e293b !important;
    color:white !important;
}

@keyframes toastShow{

    from{
        opacity:0;
        transform:translateY(-20px);
    }

    to{
        opacity:1;
        transform:translateY(0);
    }

}


    </style>

</head>
<body>

{{-- TOAST NOTIFICATION --}}
@if(session('success'))

<div class="custom-toast show"
     id="toastNotif">

    <div class="d-flex align-items-center gap-3">

        <div class="toast-icon">
            ✓
        </div>

        <div>

            <div class="fw-bold">
                Berhasil
            </div>

            <small>
                {{ session('success') }}
            </small>

        </div>

    </div>

</div>

@endif

{{-- NAVBAR --}}
<nav class="navbar custom-navbar">

    <div class="container">

        {{-- LOGO --}}
        <a href="/" class="navbar-brand d-flex align-items-center gap-2">

    @if(!empty($setting->logo))

        <img src="{{ asset('storage/'.$setting->logo) }}"
             width="36"
             height="36"
             class="rounded"
             style="object-fit:cover;">

    @else

        <span>📚</span>

    @endif

    <span>
        {{ $setting->site_name ?? 'Baca Online' }}
    </span>

</a>

        {{-- BUTTON MOBILE --}}
        <button class="menu-toggle"
                id="menuToggle">

            <i class="fa fa-bars"></i>

        </button>

        {{-- MENU --}}
        <div class="nav-menu align-items-center"
             id="navMenu">

            <a href="/">
                <i class="fa fa-house me-1"></i>
                Home
            </a>

            <a href="#books">
                <i class="fa fa-book me-1"></i>
                Buku
            </a>

            <a href="#categories">
                <i class="fa fa-layer-group me-1"></i>
                Kategori
            </a>

            <a href="#announcements">
                <i class="fa fa-bullhorn me-1"></i>
                Pengumuman
            </a>

            {{-- BOOKMARK --}}
            <a href="{{ route('bookmark.list') }}"
                class="btn btn-outline-danger rounded-pill px-3">

                <i class="fa-regular fa-bookmark"></i>

            </a>

            {{-- HISTORY --}}
            <a href="{{ route('history') }}"
                 class="btn btn-outline-primary rounded-pill px-3">

                    <i class="fa fa-clock-rotate-left"></i>

            </a>

            {{-- DARK MODE --}}
            <button id="darkModeBtn"
                    class="btn btn-warning rounded-pill px-4 fw-bold">
                🌙

            </button>

        </div>

    </div>

</nav>

{{-- HERO --}}
<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6">

                <div class="hero-badge mb-4">
                    📚 Koleksi Lengkap & Terpercaya
                </div>

                <h1>
                    Baca Buku Digital
                    <br>
                    <span>Kapan Saja</span>
                </h1>

                <p class="mt-4">
                    Platform baca buku online modern dengan banyak koleksi buku digital 
                    untuk menambah wawasan dan pengetahuanmu.
                </p>

                <a href="#books"
                   class="btn btn-hero mt-4">

                    📖 Mulai Membaca

                </a>

            </div>

            <div class="col-lg-6 text-center mt-5 mt-lg-0">

                <img src="{{ asset('images/logowebasli.png') }}"
                     class="img-fluid hero-logo">

            </div>

        </div>

    </div>

</section>

{{-- SEARCH --}}
<div class="container">

    <div class="search-box">

        <form action="/"
              method="GET"
              class="loading-form>
              

            <div class="row g-3">

                <div class="col-lg-5">

                    <input type="text"
                           name="search"
                           class="form-control form-control-lg"
                           placeholder="Cari judul buku...">

                </div>

                <div class="col-lg-4">

                    <select name="category"
                            class="form-select form-select-lg">

                        <option value="">
                            Semua Kategori
                        </option>

                        @foreach($categories as $category)

                            <option value="{{ $category->id }}">

                                {{ $category->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="col-lg-3">

                    <button class="btn btn-primary btn-lg w-100">

                        <i class="fa fa-search"></i>

                        Cari Buku

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

{{-- STATISTIK --}}
<div class="container py-5">

    <div class="row g-4">

        <div class="col-md-3">

            <div class="stats-card">

                <div style="font-size:28px;">
                    📚
                </div>

                <h2 class="fw-bold mt-3">

                    {{ $totalBooks }}

                </h2>

                <p class="text-muted mb-0">

                    Total Buku

                </p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="stats-card">

                <div style="font-size:28px;">
                    🗂
                </div>

                <h2 class="fw-bold mt-3">

                    {{ $totalCategories }}

                </h2>

                <p class="text-muted mb-0">

                    Kategori

                </p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="stats-card">

                <div style="font-size:28px;">
                    👀
                </div>

                <h2 class="fw-bold mt-3">

                    {{ $totalReaders }}

                </h2>

                <p class="text-muted mb-0">

                    Dibaca

                </p>

            </div>

        </div>

        <div class="col-md-3">

            <div class="stats-card">

                <div style="font-size:28px;">
                    💬
                </div>

                <h2 class="fw-bold mt-3">

                    {{ $totalComments }}

                </h2>

                <p class="text-muted mb-0">

                    Komentar

                </p>

            </div>

        </div>

    </div>

</div>

{{-- STATS --}}
<section class="py-5">

    <div class="container">

        <div class="row g-4">

            <div class="col-md-4">

                <div class="stats-box fade-up">

                    <div class="stats-number">
                        {{ $totalBooks }}+
                    </div>

                    <h5>
                        Koleksi Buku
                    </h5>

                </div>

            </div>

            <div class="col-md-4">

                <div class="stats-box fade-up">

                    <div class="stats-number">
                        {{ $categories->count() }}+
                    </div>

                    <h5>
                        Kategori Buku
                    </h5>

                </div>

            </div>

            <div class="col-md-4">

                <div class="stats-box fade-up">

                    <div class="stats-number">
                        {{ $announcements->count() }}+
                    </div>

                    <h5>
                        Pengumuman
                    </h5>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- BUKU --}}
<div class="container py-5"
     id="books">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="section-title mb-0">
            📚 Buku Terbaru
        </h2>

        <span class="text-muted">
            {{ $books->count() }} Buku
        </span>

    </div>

    <div class="row g-4">

        @forelse($books as $book)

        <div class="col-lg-3 col-md-6">

            <div class="book-card fade-up">

                {{-- COVER --}}
                <div class="position-relative">

                    @if($book->cover)

                        <img src="{{ asset('storage/'.$book->cover) }}"
                             class="w-100 book-cover">

                    @else

                        <img src="https://via.placeholder.com/300x400?text=No+Cover"
                             class="w-100 book-cover">

                    @endif

                    {{-- CATEGORY --}}
                    <span class="badge bg-primary position-absolute top-0 end-0 m-3">

                        {{ $book->category->name ?? 'Umum' }}

                    </span>

                </div>

                {{-- BODY --}}
                <div class="p-4">

                    <h5 class="fw-bold mb-2">
                        {{ $book->title }}
                    </h5>

                    <p class="text-muted small mb-2">
                        ✍ {{ $book->author }}
                    </p>

                    {{-- DESCRIPTION --}}
                    <p class="small text-muted mb-3"
                       style="
                            min-height:48px;
                            display:-webkit-box;
                            -webkit-line-clamp:2;
                            -webkit-box-orient:vertical;
                            overflow:hidden;
                       ">

                        {{ $book->description ?? 'Tidak ada deskripsi buku.' }}

                    </p>

                    {{-- YEAR + DETAIL --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <small class="text-muted fw-semibold">
                            📅 {{ $book->year }}
                        </small>

                        <button class="btn btn-outline-primary btn-sm rounded-pill"
                                data-bs-toggle="modal"
                                data-bs-target="#bookModal{{ $book->id }}">

                            Detail

                        </button>

                    </div>

                    {{-- BUTTON --}}
                    <div class="d-flex align-items-center gap-2">

                        {{-- BACA --}}
                        <a href="{{ route('books.read', $book->id) }}"
                           class="btn btn-primary rounded-pill px-4 flex-fill">

                            <i class="fa fa-book-open me-1"></i>

                            Baca

                        </a>

                        {{-- BOOKMARK --}}
                        <form action="{{ route('bookmark.store', $book->id) }}"
                              method="POST"
                              class="loading-form">

                            @csrf

                            <button class="btn btn-light rounded-circle shadow-sm"
                                    style="width:42px;height:42px;">

                                <i class="fa-regular fa-bookmark text-primary"></i>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

        {{-- MODAL DETAIL --}}
        <div class="modal fade"
             id="bookModal{{ $book->id }}"
             tabindex="-1">

            <div class="modal-dialog modal-dialog-centered modal-lg">

                <div class="modal-content border-0 rounded-4 overflow-hidden">

                    <div class="modal-body p-0">

                        <div class="row g-0">

                            {{-- IMAGE --}}
                            <div class="col-md-5">

                                @if($book->cover)

                                    <img src="{{ asset('storage/'.$book->cover) }}"
                                         class="w-100 h-100"
                                         style="object-fit:cover;min-height:450px;">

                                @else

                                    <img src="https://via.placeholder.com/400x550?text=No+Cover"
                                         class="w-100 h-100"
                                         style="object-fit:cover;min-height:450px;">

                                @endif

                            </div>

                            {{-- CONTENT --}}
                            <div class="col-md-7">

                                <div class="p-4">

                                    <span class="badge bg-primary rounded-pill px-3 py-2 mb-3">

                                        {{ $book->category->name ?? 'Umum' }}

                                    </span>

                                    <h3 class="fw-bold mb-2">

                                        {{ $book->title }}

                                    </h3>

                                    <p class="text-muted mb-2">

                                        ✍ {{ $book->author }}

                                    </p>

                                    <p class="text-muted mb-4">

                                        📅 {{ $book->year }}

                                    </p>

                                    <h6 class="fw-bold">
                                        Deskripsi Buku
                                    </h6>

                                    <p class="text-muted"
                                       style="line-height:1.8;">

                                        {{ $book->description ?? 'Tidak ada deskripsi buku.' }}

                                    </p>

                                    <div class="d-flex gap-2 mt-4">

                                        <a href="{{ route('books.read', $book->id) }}"
                                           class="btn btn-primary rounded-pill px-4">

                                            📖 Baca Sekarang

                                        </a>

                                        <button type="button"
                                                class="btn btn-secondary rounded-pill px-4"
                                                data-bs-dismiss="modal">

                                            Tutup

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        @empty

<div class="col-12">

    <div class="text-center bg-white rounded-4 shadow-sm p-5">

        <div style="font-size:70px;">
            🔍
        </div>

        <h3 class="fw-bold mt-3">
            Buku Tidak Ditemukan
        </h3>

        <p class="text-muted mb-4">
            Coba gunakan kata kunci lain atau pilih kategori berbeda.
        </p>

        <a href="{{ url('/') }}"
           class="btn btn-primary rounded-pill px-4">

            Reset Pencarian

        </a>

    </div>

</div>

@endforelse

    </div>

    {{-- PAGINATION --}}
    <div class="mt-5 d-flex justify-content-center">

        {{ $books->links() }}

    </div>

</div>

{{-- BUKU POPULER --}}
<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="section-title mb-0">
            🔥 Buku Populer
        </h2>

        <span class="text-muted">
            Berdasarkan riwayat baca
        </span>

    </div>

    <div class="row g-4">

        @forelse($popularBooks as $popular)

        <div class="col-lg-3 col-md-6">

            <div class="book-card fade-up">

                <div class="position-relative">

                    @if($popular->cover)

                        <img src="{{ asset('storage/'.$popular->cover) }}"
                             class="w-100 book-cover">

                    @else

                        <img src="https://via.placeholder.com/300x400?text=No+Cover"
                             class="w-100 book-cover">

                    @endif

                    <span class="badge bg-danger position-absolute top-0 start-0 m-3">
                        🔥 Populer
                    </span>

                    <span class="badge bg-primary position-absolute top-0 end-0 m-3">
                        {{ $popular->category->name ?? 'Umum' }}
                    </span>

                </div>

                <div class="p-4">

                    <h5 class="fw-bold mb-2">
                        {{ $popular->title }}
                    </h5>

                    <p class="text-muted small mb-3">
                        ✍ {{ $popular->author }}
                    </p>

                    <div class="d-flex justify-content-between align-items-center gap-2">

                        <small class="text-muted">
                            👀 {{ $popular->read_histories_count ?? 0 }} dibaca
                        </small>

                        <a href="{{ route('books.read', $popular->id) }}"
                           class="btn btn-primary rounded-pill">

                            Baca

                        </a>

                    </div>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12">

            <div class="alert alert-info rounded-4">
                Belum ada buku populer.
            </div>

        </div>

        @endforelse

    </div>

</div>

{{-- KATEGORI --}}
<div class="container py-5"
     id="categories">

    <div class="text-center mb-5">

        <h2 class="section-title mb-2">
            🗂 Kategori Buku
        </h2>

        <p class="text-muted">
            Pilih kategori favorit untuk mulai membaca
        </p>

    </div>

    <div class="d-flex gap-4 overflow-auto pb-3 px-2 justify-content-center category-slider">

        @foreach($categories as $category)

        <a href="{{ route('books.category', $category->id) }}"
           class="text-decoration-none">

            <div class="category-card"
                 style="min-width:220px;">

                <div class="mb-3">

                    <i class="fa fa-book-open"
                       style="font-size:30px;"></i>

                </div>

                <h5 class="fw-bold mb-2">

                    {{ $category->name }}

                </h5>

                <small class="text-muted">

                    Lihat Buku

                </small>

            </div>

        </a>

        @endforeach

    </div>

</div>

{{-- FEATURES --}}
<section class="py-5 why-section"
         id="features">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title fw-bold">
                ✨ Kenapa Memilih Website Ini?
            </h2>

            <p class="section-subtitle text-muted">
                Pengalaman membaca buku digital yang modern dan nyaman.
            </p>

        </div>

        <div class="row g-4">

            {{-- FITUR 1 --}}
            <div class="col-lg-4 col-md-6">

                <div class="feature-box fade-up h-100">

                    <div class="feature-icon">

                        <i class="fa fa-book-open"></i>

                    </div>

                    <h4 class="fw-bold mt-3 mb-3">
                        Baca Online
                    </h4>

                    <p class="mb-0">
                        Buku dapat langsung dibaca secara online tanpa download.
                    </p>

                </div>

            </div>

            {{-- FITUR 2 --}}
            <div class="col-lg-4 col-md-6">

                <div class="feature-box fade-up h-100">

                    <div class="feature-icon">

                        <i class="fa fa-mobile-screen"></i>

                    </div>

                    <h4 class="fw-bold mt-3 mb-3">
                        Responsive
                    </h4>

                    <p class="mb-0">
                        Tampilan modern dan nyaman di semua perangkat.
                    </p>

                </div>

            </div>

            {{-- FITUR 3 --}}
            <div class="col-lg-4 col-md-6">

                <div class="feature-box fade-up h-100">

                    <div class="feature-icon">

                        <i class="fa fa-layer-group"></i>

                    </div>

                    <h4 class="fw-bold mt-3 mb-3">
                        Banyak Kategori
                    </h4>

                    <p class="mb-0">
                        Temukan berbagai kategori buku dengan mudah.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- PENGUMUMAN --}}
<section class="py-5"
         id="announcements">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                📢 Pengumuman
            </h2>

            <p class="section-subtitle">
                Informasi terbaru dari admin website.
            </p>

        </div>

        <div class="row g-4">

            @foreach($announcements as $announcement)

            <div class="col-lg-4">

                <div class="announcement-card fade-up">

                    <h5 class="fw-bold mb-3">
                        {{ $announcement->title }}
                    </h5>

                    <p class="text-muted mb-0">
                        {{ $announcement->content }}
                    </p>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

{{-- FOOTER --}}
<footer>

    <div class="container">

        <div class="row g-5">

            {{-- TENTANG --}}
            <div class="col-lg-4">

                <h3 class="fw-bold mb-4">

                    📚 {{ $setting->site_name ?? 'Perpustakaan Digital' }}

                </h3>

                <p style="color:rgba(255,255,255,0.7); line-height:1.8;">

                    {{ $setting->description ?? 'Platform baca buku digital modern.' }}

                </p>

                <div class="d-flex gap-3 mt-4">

                    <div class="footer-icon">
                        <i class="fab fa-facebook-f"></i>
                    </div>

                    <div class="footer-icon">
                        <i class="fab fa-instagram"></i>
                    </div>

                    <div class="footer-icon">
                        <i class="fab fa-youtube"></i>
                    </div>

                    <div class="footer-icon">
                        <i class="fab fa-twitter"></i>
                    </div>

                </div>

            </div>

            {{-- MENU --}}
            <div class="col-lg-3">

                <h5 class="fw-bold mb-4">
                    Menu Navigasi
                </h5>

                <div class="d-flex flex-column gap-3">

                    <a href="/" class="footer-link">
                        Home
                    </a>

                    <a href="#books" class="footer-link">
                        Buku Digital
                    </a>

                    <a href="#categories" class="footer-link">
                        Kategori
                    </a>

                    <a href="#announcements" class="footer-link">
                        Pengumuman
                    </a>

                </div>

            </div>

            {{-- KONTAK --}}
            <div class="col-lg-5">

                <h5 class="fw-bold mb-4">
                    Informasi Perpustakaan
                </h5>

                {{-- ALAMAT --}}
                <div class="d-flex mb-4">

                    <div class="me-3">
                        <i class="fa fa-location-dot"></i>
                    </div>

                    <div>
                        {{ $setting->address ?? 'Alamat belum diatur' }}
                    </div>

                </div>

                {{-- EMAIL --}}
                <div class="d-flex mb-4">

                    <div class="me-3">
                        <i class="fa fa-envelope"></i>
                    </div>

                    <div>
                        {{ $setting->email ?? 'email@website.com' }}
                    </div>

                </div>

                {{-- TELEPON --}}
                <div class="d-flex mb-4">

                    <div class="me-3">
                        <i class="fa fa-phone"></i>
                    </div>

                    <div>
                        {{ $setting->phone ?? '+62 812 3456 7890' }}
                    </div>

                </div>

                {{-- JAM --}}
                <div class="d-flex">

                    <div class="me-3">
                        <i class="fa fa-clock"></i>
                    </div>

                    <div>
                        {{ $setting->open_hours ?? 'Setiap Hari 08.00 - 22.00 WIB' }}
                    </div>

                </div>

            </div>

        </div>

        <hr class="border-light opacity-25 my-5">

        {{-- COPYRIGHT --}}
        <div class="text-center pb-4"
             style="color:rgba(255,255,255,0.7);">

            © {{ date('Y') }}

            {{ $setting->site_name ?? 'Perpustakaan Digital' }}

            <br>

            {{ $setting->footer ?? 'All Rights Reserved' }}

        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

    const darkBtn = document.getElementById('darkModeBtn');

if(localStorage.getItem('theme') === 'dark'){

    document.body.classList.add('dark-mode');

    if(darkBtn){
        darkBtn.innerHTML = '☀ Light';
    }

}

if(darkBtn){

    darkBtn.addEventListener('click', function(){

        document.body.classList.toggle('dark-mode');

        if(document.body.classList.contains('dark-mode')){

            localStorage.setItem('theme', 'dark');

            darkBtn.innerHTML = '☀ Light';

        }else{

            localStorage.setItem('theme', 'light');

            darkBtn.innerHTML = '🌙 Dark';

        }

    });

}

</script>

<script>

    const menuToggle =
        document.getElementById('menuToggle');

    const navMenu =
        document.getElementById('navMenu');

    menuToggle.addEventListener('click', function(){

        navMenu.classList.toggle('active');

    });

</script>

<script>

let lastScroll = 0;

const navbar =
    document.querySelector('.custom-navbar');

window.addEventListener('scroll', function(){

    let currentScroll = window.pageYOffset;

    if(currentScroll > lastScroll && currentScroll > 100){

        navbar.classList.add('hide-navbar');

    }else{

        navbar.classList.remove('hide-navbar');

    }

    lastScroll = currentScroll;

});

</script>

<script>

const fadeUps =
    document.querySelectorAll('.fade-up');

function showOnScroll(){

    fadeUps.forEach(item => {

        const itemTop =
            item.getBoundingClientRect().top;

        if(itemTop < window.innerHeight - 80){

            item.classList.add('show');

        }

    });

}

window.addEventListener('scroll', showOnScroll);

showOnScroll();

</script>

<script>

const toast =
    document.getElementById('toastNotif');

if(toast){

    setTimeout(() => {

        toast.style.opacity = '0';

        toast.style.transform =
            'translateY(-20px)';

        setTimeout(() => {

            toast.remove();

        }, 300);

    }, 2500);

}

</script>

<script>

/* =========================
   BUTTON LOADING
========================= */

document.querySelectorAll('.loading-form')
.forEach(form => {

    form.addEventListener('submit', function(){

        const button =
            form.querySelector('button');

        if(button){

            button.disabled = true;

            button.innerHTML = `
                <span class="spinner-border spinner-border-sm me-2"></span>
                Loading...
            `;

        }

    });

});

</script>


</body>
</html>