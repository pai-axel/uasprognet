<!doctype html>
<html lang="en">
{{-- head --}}
    @include('sb-admin/head')

  <body id="page-top" class="sub_page">
    {{-- navbar --}}
    <div class="hero_area">
    @include('artikel/template/navbar')
</div>

   
        @yield('content')
  

    <!-- Footer -->
      @include('sb-admin/footer')

    <!-- Scroll to Top Button-->
    @include('sb-admin/button-topbar')

   {{-- logout --}}
   @include('sb-admin/logout-modal')
  
   {{-- javascript --}}
   @include('sb-admin/javascript')
  </body>
  
</html>