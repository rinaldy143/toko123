<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('jual/posts*') ? 'active' : '' }}" href="/jual/posts">
            <span data-feather="file-text"></span>
            Penjualan
          </a>
        </li>
      </ul>


        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-item-left px-3 mt-4 mb-1 text-mute">
            <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('jual/kategoris*') ? 'active' : '' }}" href="/jual/kategoris">
                        <span data-feather="grid"></span>
                        kategori Barang
                    </a>
                </li>
            </ul>
        @endcan
    </div>
  </nav>
