{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <a class="navbar-brand" href="/">WEB BLOG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ ( $active === "home" ? 'active' : '') }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ( $active === "posts" ? 'active' : '') }}" href="/posts">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ( $active === "categories" ? 'active' : '') }}" href="/categories">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ( $active === "about" ? 'active' : '') }}" href="/about">About</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                {{-- Mengganti / Merubah Tombol Login --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome Back, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/dashboard">
                                    <i class="bi bi-grid-1x2-fill"></i> Dashboard
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-door-open-fill"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/login" class="nav-link {{ ($active === "login" ? 'active' : '') }}" title="Login">
                            <i class="bi bi-door-open"></i>
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>