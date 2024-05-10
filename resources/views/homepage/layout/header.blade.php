 <!-- Navbar Start -->


 <nav class="navbar navbar-expand-lg bg-dark navbar-light shadow-sm py-3 py-lg-0 px-3 px-lg-0">
    <a href="index.html" class="navbar-brand ms-lg-5">
        <h1 class="m-0 text-uppercase text-danger"><i class=" p fs-1 text-danger me-3"></i>Tempaw Care</h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 ">
            <a href="/" class="nav-item nav-link text-light" >Home</a>
            <a href="/about" class="nav-item nav-link text-white">About</a>
            <a href="/service" class="nav-item nav-link text-white">Service</a>
            <!--login Register Dropdown-->
            <div class="nav-item dropdown" style="margin-right: 20px">
                {{-- @if (Route::has('login')) --}}
                @auth

                @else
                <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown">User</a>
                <div class="dropdown-menu m-0">
                    <a href="{{ route('login') }}" class="dropdown-item">Login</a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="dropdown-item">Register</a>
                    @endif
                @endauth    
                </div>
            {{-- @endif --}}
            
            
        </div>
        {{-- <div class="nav-item dropdown " style="margin-right: 30px;">
            <a href="#" class="nav-link dropdown-toggle text-white" data-bs-toggle="dropdown">Applicant</a>
            <div class="dropdown-menu m-0">
                <a href="#" class="dropdown-item">Login</a>
                <a href="#" class="dropdown-item">Register</a>
        </div> --}}
    </div>
</nav>
<!-- Navbar End -->








