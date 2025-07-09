<!-- header section starts -->
<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container">
    <div class="custom_menu-btn">
      <button onclick="openNav()">
        <span class="s-1"> </span>
        <span class="s-2"> </span>
        <span class="s-3"> </span>
      </button>
    </div>
    <div id="myNav" class="overlay">
      <div class="menu_btn-style">
        <button onclick="closeNav()">
          <span class="s-1"> </span>
          <span class="s-2"> </span>
          <span class="s-3"> </span>
        </button>
      </div>
      <div class="overlay-content">
        <a class="active" href="/">Home</a>
        <a href="#" class="dropdown-trigger" onclick="toggleDropdown('tentangDropdown')">Tentang Kami <i class="fa fa-chevron-down"></i></a>
        <div id="tentangDropdown" class="dropdown-content">
          <a href="/artikel-history">Sejarah</a>
          <a href="/artikel-vision">Visi dan Misi</a>
          <a href="/artikel-value">Nilai-Nilai Perusahaan</a>
          <a href="/artikel-struktur-organisasi">Struktur Organisasi</a>
        </div>
        <a href="/artikel-portfolio">Portfolio</a>
        <a href="#" class="dropdown-trigger" onclick="toggleDropdown('kabarDropdown')">Kabar <i class="fa fa-chevron-down"></i></a>
        <div id="kabarDropdown" class="dropdown-content">
          <a href="/artikel-berita">Berita</a>
          <a href="/artikel-artikel">Artikel</a>
          <a href="/artikel-karir">Karir</a>
        </div>
        <a href="artikel-kontak">Kontak</a>
        <a href="artikel-faq">FAQ</a>
        <a href="/artikel-testimoni">Testimoni</a>
      </div>
    </div>
    <a class="navbar-brand" href="/">
      <span>{{$options->company_name}}</span>
    </a>
    <div class="user_option">
      <form class="form-inline" action="{{ url('/search') }}" method="GET">
        <button class="btn nav_search-btn" type="button" onclick="toggleSearchInput()">
          <i class="fa fa-search" aria-hidden="true"></i>
        </button>
        <div id="searchDropdown" class="search_dropdown">
          <input type="search" name="query" id="searchInput" class="search_input" placeholder="Search..." />
        </div>
      </form>

      <!-- User icon dropdown -->
<div class="user-dropdown">
    @guest
        {{-- Jika pengguna belum login, tampilkan opsi Login dan Register --}}
        <a href="#" class="user-icon" onclick="toggleUserDropdown()">
            <i class="fa fa-user" aria-hidden="true"></i>
        </a>
        <div id="userDropdown" class="dropdown-content">
            @if (Route::has('login'))
                <a href="{{ route('login') }}">Login</a>
            @endif
        </div>
    @else
        {{-- Jika pengguna sudah login, tampilkan nama pengguna dan opsi tambahan untuk admin --}}
        <a href="#" class="user-icon" onclick="toggleUserDropdown()">
            <i class="fa fa-user" aria-hidden="true"></i> 
        </a>
        <div id="userDropdown" class="dropdown-content">
        @role('admin')
                <a href="/dashboard">Dashboard</a>
                @endrole
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    @endguest
</div>

    </div>
  </nav>
</header>
<!-- end header section -->
