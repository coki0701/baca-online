<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>

        @yield('title',
            $globalSetting->site_name ?? 'Perpustakaan Digital')

    </title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- ICON --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        body{
            background:#f1f5f9;
            font-family:'Poppins', sans-serif;
            color:#0f172a;
        }

        /* NAVBAR */
        .navbar-custom{
            background:rgba(255,255,255,0.9);
            backdrop-filter:blur(12px);
            box-shadow:0 4px 20px rgba(0,0,0,0.05);
            padding:14px 0;
        }

        .brand-logo{
            font-size:24px;
            font-weight:700;
            color:#2563eb;
            text-decoration:none;
        }

        .brand-logo:hover{
            color:#1d4ed8;
        }

        .nav-link{
            color:#334155 !important;
            font-weight:500;
            border-radius:12px;
            padding:10px 16px !important;
            transition:0.3s;
        }

        .nav-link:hover{
            background:#eff6ff;
            color:#2563eb !important;
        }

        /* CONTENT */
        .main-content{
            min-height:85vh;
            padding-top:40px;
            padding-bottom:50px;
        }

        /* BUTTON */
        .btn-modern{
            border:none;
            border-radius:50px;
            padding:10px 18px;
            transition:0.3s;
            font-weight:500;
        }

        .btn-logout{
            background:#ef4444;
            color:white;
        }

        .btn-logout:hover{
            background:#dc2626;
            color:white;
        }

        /* CARD */
        .card{
            border:none;
            border-radius:24px;
        }

        /* FOOTER */
        .footer{
            padding:30px 0;
            text-align:center;
            color:#64748b;
            font-size:14px;
        }

        /* DARK MODE */
        .dark-mode{
            background:#0f172a !important;
            color:white !important;
        }

        .dark-mode .navbar-custom{
            background:#111827 !important;
        }

        .dark-mode .nav-link{
            color:white !important;
        }

        .dark-mode .nav-link:hover{
            background:#1e293b !important;
        }

        .dark-mode .card{
            background:#1e293b !important;
            color:white !important;
        }

        .dark-mode .footer{
            color:#cbd5e1 !important;
        }

        .dark-mode .text-muted{
            color:#cbd5e1 !important;
        }

        /* SCROLLBAR */
        ::-webkit-scrollbar{
            width:8px;
        }

        ::-webkit-scrollbar-thumb{
            background:#cbd5e1;
            border-radius:20px;
        }

        @media(max-width:991px){

            .profile-box{
                margin-top:10px;
            }

        }

    </style>

</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-light navbar-custom sticky-top">

    <div class="container">

        {{-- LOGO --}}
        <a class="brand-logo d-flex align-items-center"
           href="{{ url('/') }}">

            @if(!empty($globalSetting->logo))

                <img src="{{ asset('storage/'.$globalSetting->logo) }}"
                     width="42"
                     class="me-2 rounded">

            @endif

            {{ $globalSetting->site_name ?? 'Perpustakaan Digital' }}

        </a>

        {{-- MOBILE --}}
        <button class="navbar-toggler border-0 shadow-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        {{-- MENU --}}
        <div class="collapse navbar-collapse"
             id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

    <li class="nav-item">

        <a class="nav-link"
           href="{{ url('/') }}">

            <i class="fa-solid fa-house me-1"></i>
            Home

        </a>

    </li>

    <li class="nav-item">

        <a class="nav-link"
           href="{{ route('bookmark.list') }}">

            <i class="fa-solid fa-heart me-1"></i>
            Bookmark

        </a>

    </li>

    <li class="nav-item">

        <a class="nav-link"
           href="{{ route('history') }}">

            <i class="fa-solid fa-clock-rotate-left me-1"></i>
            Riwayat

        </a>

    </li>

    {{-- DARK MODE --}}
    <li class="nav-item">

        <button id="darkModeBtn"
                class="btn btn-dark rounded-pill px-3">

            🌙

        </button>

    </li>


</ul>

        </div>

    </div>

</nav>

{{-- CONTENT --}}
<div class="container main-content">

    @yield('content')

</div>

{{-- FOOTER --}}
<div class="footer">

    © {{ date('Y') }}
    {{ $globalSetting->footer ?? 'Perpustakaan Digital' }}

</div>

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

</body>
</html>