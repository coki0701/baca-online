<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title') - Admin</title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- FONT AWESOME --}}
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#f1f5f9;
            font-family:'Segoe UI', sans-serif;
            overflow-x:hidden;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar{
            width:270px;
            height:100vh;
            position:fixed;
            top:0;
            left:0;
            background:linear-gradient(180deg,#0f172a,#1e293b);
            color:white;
            padding:25px 15px;
            overflow-y:auto;
            z-index:999;
            transition:0.3s;
            box-shadow:5px 0 20px rgba(0,0,0,0.08);
        }

        .sidebar-logo{
            text-align:center;
            margin-bottom:35px;
        }

        .sidebar-logo h3{
            font-size:28px;
            font-weight:800;
            margin-bottom:5px;
        }

        .sidebar-logo p{
            font-size:13px;
            color:#94a3b8;
        }

        .menu-title{
            color:#64748b;
            font-size:12px;
            text-transform:uppercase;
            margin:20px 15px 10px;
            letter-spacing:1px;
        }

        .sidebar a{
            display:flex;
            align-items:center;
            gap:12px;
            color:#cbd5e1;
            text-decoration:none;
            padding:14px 18px;
            border-radius:16px;
            margin-bottom:8px;
            transition:all 0.3s ease;
            font-size:15px;
            font-weight:500;
        }

        .sidebar a:hover{
            background:rgba(255,255,255,0.08);
            color:white;
            transform:translateX(4px);
        }

        .sidebar a.active{
            background:#2563eb;
            color:white;
            box-shadow:0 10px 20px rgba(37,99,235,0.3);
        }

        .sidebar a i{
            width:18px;
            text-align:center;
            font-size:15px;
        }

        /* =========================
           MAIN CONTENT
        ========================= */

        .main-content{
            margin-left:270px;
            padding:30px;
            transition:0.3s;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar{
            background:white;
            border-radius:24px;
            padding:20px 25px;
            margin-bottom:30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 5px 20px rgba(0,0,0,0.05);
        }

        .topbar h4{
            margin:0;
            font-weight:700;
            color:#0f172a;
        }

        .admin-profile{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .profile-avatar{
            width:45px;
            height:45px;
            border-radius:50%;
            background:#2563eb;
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:bold;
            font-size:16px;
        }

        /* =========================
           CARDS
        ========================= */

        .card{
            border:none;
            border-radius:24px;
            box-shadow:0 5px 20px rgba(0,0,0,0.05);
        }

        .card-dashboard{
            border-radius:24px;
            padding:28px;
            color:white;
            position:relative;
            overflow:hidden;
            transition:0.3s;
            box-shadow:0 10px 25px rgba(0,0,0,0.08);
        }

        .card-dashboard:hover{
            transform:translateY(-6px);
        }

        .card-dashboard h5{
            font-size:15px;
            opacity:0.9;
        }

        .card-dashboard h2{
            font-size:34px;
            margin-top:10px;
            font-weight:800;
        }

        .card-dashboard i{
            position:absolute;
            right:20px;
            bottom:20px;
            font-size:50px;
            opacity:0.15;
        }

        /* =========================
           BUTTON
        ========================= */

        .btn{
            border-radius:14px;
            padding:10px 18px;
            font-weight:600;
        }

        .btn-primary{
            background:#2563eb;
            border:none;
        }

        .btn-primary:hover{
            background:#1d4ed8;
        }

        /* =========================
           TABLE
        ========================= */

        .table{
            border-radius:18px;
            overflow:hidden;
            margin-bottom:0;
        }

        .table thead{
            background:#0f172a;
            color:white;
        }

        .table th{
            border:none;
            padding:16px;
            font-size:14px;
        }

        .table td{
            padding:16px;
            vertical-align:middle;
        }

        /* =========================
           PAGINATION
        ========================= */

        .pagination{
            gap:6px;
        }

        .pagination .page-link{
            border:none;
            border-radius:10px;
            color:#0f172a;
        }

        .pagination .active .page-link{
            background:#2563eb;
        }

        /* =========================
           SCROLLBAR
        ========================= */

        ::-webkit-scrollbar{
            width:8px;
        }

        ::-webkit-scrollbar-thumb{
            background:#94a3b8;
            border-radius:20px;
        }

        /* =========================
           MOBILE
        ========================= */

        .mobile-toggle{
            display:none;
        }

        @media(max-width:991px){

            .sidebar{
                left:-100%;
            }

            .sidebar.show{
                left:0;
            }

            .main-content{
                margin-left:0;
                padding:20px;
            }

            .mobile-toggle{
                display:flex;
                width:45px;
                height:45px;
                border:none;
                border-radius:12px;
                background:#2563eb;
                color:white;
                align-items:center;
                justify-content:center;
            }

            .topbar{
                flex-wrap:wrap;
                gap:15px;
            }

        }

    </style>

</head>

<body>

    {{-- SIDEBAR --}}
    <div class="sidebar" id="sidebar">

        <div class="sidebar-logo">

            <h3>📚 Admin</h3>

            <p>Perpustakaan Digital</p>

        </div>

        <div class="menu-title">
            MAIN MENU
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">

            <i class="fa fa-home"></i>
            Dashboard

        </a>

        <a href="{{ route('admin.books.index') }}"
           class="{{ request()->routeIs('admin.books.*') ? 'active' : '' }}">

            <i class="fa fa-book"></i>
            Buku

        </a>

        <a href="{{ route('admin.categories.index') }}"
           class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">

            <i class="fa fa-layer-group"></i>
            Kategori

        </a>

        <a href="{{ route('admin.users.index') }}"
           class="{{ request()->routeIs('admin.users.*') ? 'active' : '' }}">

            <i class="fa fa-users"></i>
            Pengguna

        </a>

        <div class="menu-title">
            MANAGEMENT
        </div>

        <a href="{{ route('admin.comments') }}">

            <i class="fa fa-comments"></i>
            Komentar

        </a>

        <a href="{{ route('admin.read_histories') }}">

            <i class="fa fa-clock"></i>
            Riwayat Baca

        </a>

        <a href="{{ route('admin.announcements') }}">

            <i class="fa fa-bullhorn"></i>
            Pengumuman

        </a>

        <a href="{{ route('admin.reports') }}">

            <i class="fa fa-chart-line"></i>
            Laporan

        </a>

        <a href="{{ route('admin.profile') }}"
            class="{{ request()->routeIs('admin.profile') ? 'active' : '' }}">

            <i class="fa fa-user-gear"></i>
            Profile Admin

        </a>

        <a href="{{ route('admin.settings') }}">

            <i class="fa fa-gear"></i>
            Pengaturan

        </a>

        <div class="mt-4 px-2">

            <form action="{{ route('logout') }}"
                  method="POST"
                  class="loading-form">

                @csrf

                <button class="btn btn-danger w-100 rounded-4">

                    <i class="fa fa-right-from-bracket me-2"></i>

                    Logout

                </button>

            </form>

        </div>

    </div>

    {{-- MAIN --}}
    <div class="main-content">

        {{-- TOPBAR --}}
        <div class="topbar">

            <div class="d-flex align-items-center gap-3">

                <button class="mobile-toggle"
                        onclick="toggleSidebar()">

                    <i class="fa fa-bars"></i>

                </button>

                <div>

                    <h4>@yield('title')</h4>

                    <small class="text-muted">

                        Selamat datang kembali 👋

                    </small>

                </div>

            </div>

            <div class="admin-profile">

                <div class="text-end">

                    <div class="fw-bold">

                        {{ Auth::user()->name }}

                    </div>

                    <small class="text-muted">

                        Administrator

                    </small>

                </div>

                <div class="profile-avatar">

                    {{ strtoupper(substr(Auth::user()->name,0,1)) }}

                </div>

            </div>

        </div>

        {{-- CONTENT --}}
        @yield('content')

    </div>

<script>

    function toggleSidebar(){

        document.getElementById('sidebar')
            .classList.toggle('show');

    }

</script>

</body>
</html>