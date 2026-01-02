<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - Tata Bhuana')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    @stack('styles')
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white" style="width: 250px; min-height: 100vh;">
            <div class="p-3">
                <h5 class="fw-bold mb-4">
                    <i class="fas fa-cogs me-2"></i>
                    Admin Panel
                </h5>
                
                <nav class="nav flex-column">
                    <a class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'bg-primary' : '' }}" href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('admin.scaffoldings.*') ? 'bg-primary' : '' }}" href="{{ route('admin.scaffoldings.index') }}">
                        <i class="fas fa-building me-2"></i>Scaffolding
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('admin.projects.*') ? 'bg-primary' : '' }}" href="{{ route('admin.projects.index') }}">
                        <i class="fas fa-project-diagram me-2"></i>Proyek
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('admin.articles.*') ? 'bg-primary' : '' }}" href="{{ route('admin.articles.index') }}">
                        <i class="fas fa-newspaper me-2"></i>Artikel
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('admin.comments.*') ? 'bg-primary' : '' }}" href="{{ route('admin.comments.index') }}">
                        <i class="fas fa-comments me-2"></i>Komentar
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('admin.branches.*') ? 'bg-primary' : '' }}" href="{{ route('admin.branches.index') }}">
                        <i class="fas fa-map-marker-alt me-2"></i>Cabang
                    </a>
                    <a class="nav-link text-white {{ request()->routeIs('admin.profile') ? 'bg-primary' : '' }}" href="{{ route('admin.profile') }}">
                        <i class="fas fa-building me-2"></i>Profil Perusahaan
                    </a>
                    <hr class="text-white">
                    <a class="nav-link text-white" href="{{ route('home') }}" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i>Lihat Website
                    </a>
                    <a class="nav-link text-white" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </nav>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="flex-grow-1">
            <!-- Top Bar -->
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                <div class="container-fluid">
                    <span class="navbar-brand mb-0 h1">@yield('page-title', 'Dashboard')</span>
                    
                    <div class="navbar-nav ms-auto">
                        <span class="navbar-text">
                            <i class="fas fa-user me-2"></i>
                            {{ auth('admin')->user()->name }}
                        </span>
                    </div>
                </div>
            </nav>
            
            <!-- Page Content -->
            <main class="p-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @yield('content')
            </main>
        </div>
    </div>
    
    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
