<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">UASPROGNET</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item @yield('dashboard')">
    <a class="nav-link" href="/dashboard">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Berita dan Artikel -->
  <li class="nav-item @yield('main-berita')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#berita" aria-expanded="true" aria-controls="berita">
      <i class="fas fa-fw fa-folder"></i>
      <span>Berita</span>
    </a>
    <div id="berita" class="collapse @yield('berita')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item @yield('berita')" href="/berita">Berita</a>
        <a class="collapse-item @yield('kategori_berita')" href="/kategori_berita">Kategori Berita</a>
        <a class="collapse-item @yield('tag_berita')" href="/tag_berita">Tag Berita</a>
      </div>
    </div>
  </li>


  <li class="nav-item @yield('main-artikel')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#artikel" aria-expanded="true" aria-controls="artikel">
      <i class="fas fa-fw fa-folder"></i>
      <span>Artikel</span>
    </a>
    <div id="artikel" class="collapse @yield('artikel')" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item @yield('article')" href="/article">Artikel</a>
      <a class="collapse-item @yield('tag_artikel')" href="/tag_artikel">Tag Artikel</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Media -->
  <li class="nav-item @yield('main-media')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#media" aria-expanded="true" aria-controls="media">
      <i class="fas fa-fw fa-image"></i>
      <span>Media</span>
    </a>
    <div id="media" class="collapse @yield('media')" aria-labelledby="headingThree" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item @yield('gallery')" href="/gallery">Gallery</a>
        <a class="collapse-item @yield('faq')" href="/faq">Faq</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Produk dan Perusahaan -->
  <li class="nav-item @yield('main-produk-perusahaan')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#produkPerusahaan" aria-expanded="true" aria-controls="produkPerusahaan">
      <i class="fas fa-fw fa-briefcase"></i>
      <span>Produk & Perusahaan</span>
    </a>
    <div id="produkPerusahaan" class="collapse @yield('produk-perusahaan')" aria-labelledby="headingFour" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item @yield('product')" href="/product">Product</a>
        <a class="collapse-item @yield('support')" href="/support">Support</a>
        <a class="collapse-item @yield('about')" href="/about">About</a>
        <a class="collapse-item @yield('feature')" href="/feature">Feature</a>
        <a class="collapse-item @yield('testimoni')" href="/testimoni">Testimoni</a>
        <a class="collapse-item @yield('career')" href="/career">Career</a>
        <a class="collapse-item @yield('value_company')" href="/value_company">Nilai Perusahaan</a>
        <a class="collapse-item @yield('struktur_organisasi')" href="/struktur_organisasi">Struktur Organisasi</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Pengaturan -->
  <li class="nav-item @yield('pengaturan-active')">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaturan" aria-expanded="true" aria-controls="pengaturan">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Pengaturan</span>
    </a>
    <div id="pengaturan" class="collapse @yield('pengaturan')" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item @yield('options')" href="/options">Options</a>
        <a class="collapse-item @yield('banner')" href="/banner">Banner</a>
        <a class="collapse-item @yield('seo')" href="/seo">Seo</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="/">
      <i class="fas fa-arrow-left"></i>
      <span>Halaman Depan</span>
    </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
