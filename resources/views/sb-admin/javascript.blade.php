<!-- Bootstrap core JavaScript-->
  <script src="/vendor/sb-admin/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/vendor/sb-admin/js/sb-admin-2.min.js"></script>

  <script src="{{ asset('js/bootstrap.js') }}"></script>
  <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="{{ asset('js/custom.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
  <script src="{{ asset('magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
  
<script>
//client section owl carousel
$(".client_owl_carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 2
        }
    }
});

//wedo section owl carousel
$(".wedo_owl_carousel").owlCarousel({
    loop: true,
    margin: 10,
    nav: true,
    dots: false,
    navText: [
        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
    ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
        0: {
            items: 1
        },
        768: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});



// slider carousel control


$('.slider_btn_prev').on('click', function (e) {
    e.preventDefault()
    $('.slider_text_carousel').carousel('prev')
    $('.slider_image_carousel').carousel('prev')
})


$('.slider_btn_next').on('click', function (e) {
    e.preventDefault()
    $('.slider_text_carousel').carousel('next')
    $('.slider_image_carousel').carousel('next')
})


/** google_map js **/

function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

function toggleDropdown(dropdownId) {
  const dropdown = document.getElementById(dropdownId);

  // Close other open dropdowns
  const allDropdowns = document.querySelectorAll('.dropdown-content');
  allDropdowns.forEach((item) => {
    if (item !== dropdown) {
      item.classList.remove('show');
    }
  });

  // Toggle the current dropdown
  dropdown.classList.toggle('show');
}

// Close dropdowns when clicking outside
window.onclick = function (event) {
  if (!event.target.closest('.dropdown-trigger')) {
    const dropdowns = document.getElementsByClassName('dropdown-content');
    for (let i = 0; i < dropdowns.length; i++) {
      dropdowns[i].classList.remove('show');
    }
  }
};

// Fungsi untuk menampilkan atau menyembunyikan input pencarian
function toggleSearchInput() {
  // Sembunyikan dropdown user jika muncul
  const userDropdown = document.querySelector('.user-dropdown');
  if (userDropdown.classList.contains('show')) {
    userDropdown.classList.remove('show');
  }

  // Tampilkan atau sembunyikan input pencarian
  const searchDropdown = document.getElementById('searchDropdown');
  searchDropdown.classList.toggle('show');
}

// Fungsi untuk menampilkan atau menyembunyikan dropdown user
function toggleUserDropdown() {
  // Sembunyikan input pencarian jika muncul
  const searchDropdown = document.getElementById('searchDropdown');
  if (searchDropdown.classList.contains('show')) {
    searchDropdown.classList.remove('show');
  }

  // Tampilkan atau sembunyikan dropdown user
  const userDropdown = document.querySelector('.user-dropdown');
  userDropdown.classList.toggle('show');
}

// Menambahkan event listener untuk klik di luar dropdown atau input pencarian
document.addEventListener('click', function(event) {
  const searchDropdown = document.getElementById('searchDropdown');
  const userDropdown = document.querySelector('.user-dropdown');
  const searchBtn = document.querySelector('.nav_search-btn');
  const userIcon = document.querySelector('.user-icon');
  
  // Cek apakah klik terjadi di luar elemen-elemen yang relevan
  if (!searchDropdown.contains(event.target) && !searchBtn.contains(event.target) && searchDropdown.classList.contains('show')) {
    searchDropdown.classList.remove('show');  // Sembunyikan input pencarian
  }

  if (!userDropdown.contains(event.target) && !userIcon.contains(event.target) && userDropdown.classList.contains('show')) {
    userDropdown.classList.remove('show');  // Sembunyikan dropdown user
  }
});

$('.portfolio-gallery').each(function () {
        $(this).find('.popup-gallery').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true
            }
        });
    });

    let li = document.querySelectorAll(".faq-text li");
    for (var i = 0; i < li.length; i++) {
      li[i].addEventListener("click", (e)=>{
        let clickedLi;
        if(e.target.classList.contains("question-arrow")){
          clickedLi = e.target.parentElement;
        }else{
          clickedLi = e.target.parentElement.parentElement;
        }
       clickedLi.classList.toggle("showAnswer");
      });
    }

  </script>
  