<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>@yield('title')</title>
    {{-- style --}}
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
</head>

<body>
 
 <!-- mobile nav toggle button -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <header class="d-flex flex-column justify-content-center" id="header">
    <nav class="navbar nav-menu" id="navbar">
      <ul>
        <li><a href="{{route('home')}}" class="nav-link scrollto "><i class="bx bx-home"></i><span>Home</span></a></li>
        <li><a href="{{route('about-home')}}" class="nav-link scrollto "><i class="bx bx-camera-home"></i><span>About</span></a></li>
        @guest
          <li><a href="{{route('login')}}" class="nav-link scrollto "><i class="bx bx-user-circle"></i><span>login Admin</span></a></li>
        @endguest
        @auth
            <li> <a class="nav-link scrollto " href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bx bx-user-circle"></i><span>logout</span></a></li>  
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
            </form>
        @endauth
      </ul>
    </nav>
  </header> 

    {{-- page content --}}
    @yield('content')
 
    {{-- javascript --}}
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
</body>

</html>
</body>

</html>