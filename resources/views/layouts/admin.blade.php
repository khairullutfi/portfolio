<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>@yield('title')</title>

  @stack('prepend-style')
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <link href="/dashboard/style/main.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css" />
  @stack('addon-style')
</head>

<body>
  <div class="page-dashboard">
    <div class="d-flex" id="wrapper" data-aos="fade-right">
      <!-- Sidebar -->
      <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
          <img src="/dashboard/images/admin.png" alt="" class="my-4" style="max-width: 150px" />
        </div>
        <div class="list-group list-group-flush">
          <a href="{{route('admin-dashboard')}}"
            class="list-group-item list-group-item-action {{request()->is('admin-dashboard') ? 'active' : ''}}">Dashboard</a>
              <a href="{{route('contact-admin.index')}}"
            class="list-group-item list-group-item-action {{request()->is('contact-admin') ? 'active' : ''}}">Pesan</a>
          <a href="{{route('category.index')}}"
            class="list-group-item list-group-item-action {{request()->is('admin/category') ? 'active' : ''}}">Category
            design</a>
          <a href="{{route('design.index')}}"
            class="list-group-item list-group-item-action {{request()->is('admin/design') ? 'active' : ''}}">design</a>
          <a href="{{route('design-gallery.index')}}"
            class="list-group-item list-group-item-action {{request()->is('admin/design-gallery') ? 'active' : ''}}">design
            gallery</a>
          <a href="{{route('project.index')}}"
            class="list-group-item list-group-item-action {{request()->is('admin/project') ? 'active' : ''}}">project</a>
          <a href="{{route('category-project.index')}}"
            class="list-group-item list-group-item-action {{request()->is('admin/category-project') ? 'active' : ''}}">category project</a>
              <a href="{{route('project-gallery.index')}}"
            class="list-group-item list-group-item-action {{request()->is('admin/project-gallery') ? 'active' : ''}}">project gallery</a>
          <a href="{{route('user.index')}}"
            class="list-group-item list-group-item-action {{(request()->is('admin/user*')) ? 'active' : '' }}">Users</a>
          <a class="list-group-item list-group-item-action" href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
              class="bx bx-user-circle"></i><span>LogOut</span></a></li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">
        <nav class="navbar navbar-store navbar-expand-lg navbar-light fixed-top" data-aos="fade-down">
          <button class="btn btn-secondary d-md-none mr-auto mr-2" id="menu-toggle">
            &laquo; Menu
          </button>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto d-none d-lg-flex">
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <img src="/dashboard/images/icon-user.png" alt="" class="rounded-circle mr-2 profile-picture" />
                  Hi, lutfi
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/index.html">Back to Store</a>
                  <a class="dropdown-item" href="/dashboard-account.html">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/">Logout</a>
                </div>
              </li>

            </ul>
            <!-- Mobile Menu -->
            <ul class="navbar-nav d-block d-lg-none mt-3">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  Hi, lutfi
                </a>
              </li>
            </ul>
          </div>
        </nav>


        {{-- content --}}
        @yield('content')

      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript -->
  @stack('prepend-script')
  <script src="/dashboard/vendor/jquery/jquery.min.js"></script>
  <script src="/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
  </script>
  @stack('addon-script')
</body>

</html>