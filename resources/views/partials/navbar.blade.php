<nav class="navbar navbar-expand-lg navbar-light py-3" style="border-bottom:solid; border-color:grey; position:fixed; width:100%; z-index:1000; background-color:#F5F5F5;">
    <div class="container">
        <div class="navbar-brand p-0 m-0">
            <img src="images/logo/logo-mini.png" alt="">
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_navbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse fs-6" id="main_navbar">
            <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                <a class="nav-link mx-2" href="/#home">Home</a>
                <a class="nav-link mx-2" href="/#about">About</a>

                @auth
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="nav-link mx-2" href="/dashboard">Dashboard</a>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link mx-2" style="border: none;">Logout</a>
                @else
                    <a class="nav-link mx-2" href="/login">Login</a>
                    {{-- <a class="nav-link mx-2" href="/register">Register</a> --}}
                @endauth
            </div>
        </div>
    </div>
</nav>
