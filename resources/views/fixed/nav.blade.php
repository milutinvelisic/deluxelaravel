<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ url("/home") }}">Deluxe</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{ url("/home") }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ url("/rooms") }}" class="nav-link">Rooms</a></li>
                <li class="nav-item"><a href="{{ url("/restaurant") }}" class="nav-link">Restaurant</a></li>
                <li class="nav-item"><a href="{{ url("/about") }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ url("/blog") }}" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="{{ url("/contact") }}" class="nav-link">Contact</a></li>
                @if(!session()->has("user"))
                    <li class="nav-item"><a href="{{ url("/login") }}" class="nav-link">Login</a></li>
                    <li class="nav-item"><a href="{{ url("/register") }}" class="nav-link">Register</a></li>
                @else
                    <li class="nav-item"><a href="{{ url("/logout") }}" class="nav-link">Logout</a></li>
                @endif
                @if(session()->has("user") && session("user")->idRole == 1)
                    <li class="nav-item"><a href="{{ url("/admin/home") }}" class="nav-link">Admin</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
