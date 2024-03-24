<!DOCTYPE html>
<html lang="vi">
<title>ADMIN</title>
<meta charset="utf-8">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="theme-color" content="#ffffff">
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/css.css') }}">
<link rel="shortcut icon" type="image/png" href="{{ asset('assets/img/icon.png') }}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ asset('ckeditor5/build/ckeditor.js') }}"></script>
<style>
  img[src="https://cdn.000webhost.com/000webhost/logo/footer-powered-by-000webhost-white2.png"] {
      display: none;
  }
  img[alt="www.000webhost.com"]{display:none;}
</style>

<style>
  html,
  body,
  h1,
  h2,
  h3,
  h4,
  h5 {
    font-family: "Raleway", sans-serif
  }
  .form-select {
        /* Định dạng cho dropdown select */
        padding: .375rem 2.25rem .375rem .75rem;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        vertical-align: middle;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        width:100%;
    }
  .w3-bar-block>a:hover {
    background-color: blue;
    color: white;

  }

  .disclaimer {
    opacity: 0;

  }
</style>
<script>
  $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

</script>
<style>
  img[alt="www.000webhost.com"] {
    display: none;
  }
</style>

<body class="w3-light-grey">
  <!-- Top container -->
  <div style="z-index:100004;background:blue;" class="w3-bar w3-top w3-black w3-large">
    <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i
        class="fa fa-bars"></i> Menu</button>
    <span class="w3-bar-item w3-right">
      KimChiWatch
    </span>
  </div>

  <!-- Sidebar/menu -->
  <nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
    <div class="w3-container w3-row">
      <div class="w3-col s4">
        <img src="{{ asset('assets/images/avatar2.png') }}" class="w3-circle w3-margin-right" style="width:46px">
      </div>
      <div class="w3-col s8 w3-bar" style="padding-top:15px;padding-bottom:20px;margin-left:-20px;">
        <span style="font-size:13pt;">Xin Chào <strong>{{ Auth::user()->name }}</strong></span><br>
      </div>
    </div>
    <hr>
    <div class="w3-container">
      <h5>Danh Mục</h5>
    </div>
    <div class="w3-bar-block">
      {{-- <a href="/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-home"></i> Trang Chủ</a> --}}
      <a href="/admin/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book"></i> Sản
        Phẩm</a>
      <a href="/admin/them-san-pham/" class="w3-bar-item w3-button w3-padding"><i
          class="fa fa-plus"></i> Thêm Sản Phẩm</a>
      <a href="/admin/news/" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book"></i> Tin Tức</a>
      <a href="/admin/news/them-tin-tuc/" class="w3-bar-item w3-button w3-padding"><i
          class="fa fa-plus"></i> Thêm Tin Tức</a>
      <a href="/admin/slide" class="w3-bar-item w3-button w3-padding"><i class="fa fa-book"></i> Banner</a>
      <a href="{{ route('logout') }}" class="w3-bar-item w3-button w3-padding" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out"></i> <b>Đăng Xuất</b></a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
  </nav>

  <!-- Overlay effect when opening sidebar on small screens -->
  <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer"
    title="close side menu" id="myOverlay"></div>

  <!-- !PAGE CONTENT! -->
  <div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <!-- Header -->
    @yield('content')

    <!-- Footer -->
    <footer class="w3-container w3-padding-16 w3-light-grey">
      <div class="w3-container w3-dark-grey w3-padding-32"  style='background:#F8AFAB !important;'>
        <div class="w3-row">
          <div class="w3-container w3-third">
          </div>
          <div class="w3-container w3-third" style="text-align:center;text-transform: uppercase;font-size:12pt; color:black !important">
            <b>management page</b>
          </div>
          <div class="w3-container w3-third">
          </div>
        </div>
      </div>
    </footer>

    <!-- End page content -->
  </div>

  <script>
    // Get the Sidebar
    var mySidebar = document.getElementById("mySidebar");

    // Get the DIV with overlay effect
    var overlayBg = document.getElementById("myOverlay");

    // Toggle between showing and hiding the sidebar, and add overlay effect
    function w3_open() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
      } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
      }
    }

    // Close the sidebar with the close button
    function w3_close() {
      mySidebar.style.display = "none";
      overlayBg.style.display = "none";
    }

    document.addEventListener('DOMContentLoaded', function () {
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.log('');
        });
      ClassicEditor
      .create(document.querySelector('#editor1'))
      .catch(error => {
          console.log('');
      });
  });

</script>
</body>

</html>