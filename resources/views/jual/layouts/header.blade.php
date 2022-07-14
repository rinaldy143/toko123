<nav class="navbar navbar-expand navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="/">Toko Gw</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="/post">Pricing</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/kategoris">kategoris</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('jual*') ? 'active' : '' }}" href="/jual">jual</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/about">about</a>
        </li>
        {{-- <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
        </li> --}}
    </ul>
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <form action="/logout" method="post">
          @csrf
          <button type="submit" class="nav-link px-3 bg-dark border-0">
            Logout
            <span data-feather="log-out"></span></button>
        </form>
      </li>
    </ul>
  </nav>
