<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') — James Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    {{-- Apply saved theme before first paint --}}
    <script>
        (function(){
            var t = localStorage.getItem('portfolio-theme') || 'dark';
            document.documentElement.setAttribute('data-theme', t);
        })();
    </script>
    @stack('styles')
</head>
<body class="admin-body">

<div class="admin-wrapper">
    {{-- Sidebar --}}
    <aside class="admin-sidebar">
        <div class="sidebar-brand">
            <span class="brand-icon">⚡</span>
            <span class="brand-text">Admin Panel</span>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="nav-icon">📊</span> Dashboard
            </a>
            <a href="{{ route('admin.projects.index') }}" class="nav-item {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                <span class="nav-icon">🚀</span> Projects
            </a>
            <a href="{{ route('admin.skills.index') }}" class="nav-item {{ request()->routeIs('admin.skills*') ? 'active' : '' }}">
                <span class="nav-icon">⚙️</span> Skills
            </a>
            <a href="{{ route('home') }}" class="nav-item" target="_blank">
                <span class="nav-icon">🌐</span> View Portfolio
            </a>
        </nav>
        <div class="sidebar-footer">
            <button class="theme-toggle-admin" id="adminThemeToggle" aria-label="Toggle dark/light mode">
                <span class="toggle-track">
                    <span class="toggle-thumb"></span>
                </span>
                <span class="toggle-label" id="adminThemeLabel">🌙 Dark Mode</span>
            </button>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">🔒 Logout</button>
            </form>
        </div>

    </aside>

    {{-- Main Content --}}
    <main class="admin-main">
        <header class="admin-header">
            <h1 class="admin-page-title">@yield('page_title', 'Dashboard')</h1>
            @yield('header_actions')
        </header>

        <div class="admin-content">
            @if(session('success'))
                <div class="alert alert-success">✅ {{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert alert-error">
                    @foreach($errors->all() as $error)
                        <div>❌ {{ $error }}</div>
                    @endforeach
                </div>
            @endif

            @yield('content')
        </div>
    </main>
</div>

<script src="{{ asset('js/admin.js') }}"></script>
@stack('scripts')
</body>
</html>
