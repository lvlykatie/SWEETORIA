<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Sweetoria Sign Up</title>
  <link rel="stylesheet" href="{{ asset('public/frontend/client/form/css/styleform.css') }}" />
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

  <style>
    body {
      background-image: url("{{ asset('public/frontend/client/form/img_form/column_green.png') }}");
    }

    .form-box {

      background-image: url("public/frontend/client/form/img_form/nenformkologo.jpg");
    }
  </style>

</head>

<body>
  <div class="container">
    <!-- <header>
        <div class="logo">
          <img src="{{ asset('public/frontend/client/form/img_form/logo2.png') }}" alt="Sweetoria Logo" />
        </div>
        <nav>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Hot Deals</a></li>
            <li><a href="#">Contact</a></li>
            <li>
              
              <a href="#"><i class="fa-solid fa-cart-shopping fa-lg"></i></a>
            </li>
            <li>
              
              <a href="#"><i class="fa-solid fa-user fa-lg"></i></a>
            </li>
          </ul>
        </nav>
      </header> -->

    <div class="form-container">
      <div class="form-box">
        <h1>Sign up</h1>
        <a href="/sweetoria"><img src="{{ asset('public/frontend/client/form/img_form/nen_form.jpg') }}" alt="Logo sweetoria form"
            width="50%" /></a>

        <!-- Thêm mã hiển thị thông báo lỗi -->
        @if ($errors->any())
        <div class="alert">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        <br>

        <!-- thêm mã thông báo thành công -->
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif





        <form action="{{ url('/signup') }}" method="POST" autocomplete="on" id="signupForm" validate require>
          @csrf <!-- Token bảo mật của Laravel -->

          <div class="form-group">
            <label for="username" style="text-align: left">Username</label>
            <input
              type="text"
              id="username"
              name="username"
              placeholder="Enter your username" />
          </div>

          <div class="form-group">
            <label for="userEmail" style="text-align: left">Email</label>
            <!-- name="user_email" them dong nay vaof input email neu dc-->
            <input
              type="email"
              id="userEmail"
              name="userEmail"
              placeholder="Enter your Email" />
          </div>

          <div class="form-group">
            <label for="phonenum" style="text-align: left">Phone</label>
            <input
              type="text"
              id="phonenum"
              name="phonenum"
              placeholder="Enter your phone number" />
          </div>

          <div class="form-group">
            <label for="password" style="text-align: left">Password</label>
            <input type="password" id="password" name="password" placeholder="********" />
          </div>

          <div class="form-group">
            <label for="confirm" style="text-align: left">Confirm</label>
            <span class="error-message"></span>
            <!-- Sử dụng tên chuẩn cho xác nhận mật khẩu password_confirmation -->
            <input
              type="password"
              id="confirm pass"
              name="password_confirmation"
              placeholder="Confirm your password" />
          </div>

          <div class="error-signUp error">
            <!-- username hoặc password không đúng! -->
          </div>

          <button type="submit">Sign up</button>
        </form>

        <div class="haven't got an account">
          <br />
          <label>Have an account?
            <a href="{{ url('/signin') }}">Sign in</a>
          </label>
        </div>
      </div>
    </div>

    <!-- <footer>
      <div class="footer-info">
        <div class="contact">
          <p>
            <b><u>Contact us:</u></b>
          </p>
          <br />
          <p>
            <i class="fa-solid fa-envelope"></i> Email: sweetoria@gmail.com
          </p>
          <p><i class="fa-solid fa-globe"></i> Website: sweetoria.id.vn</p>
        </div>
        <div class="stores">
          <p>
            <b><u>Our stores:</u></b>
          </p>
          <br />
          <p><i class="fa-solid fa-location-dot"></i> TP. Hồ Chí Minh</p>
          <p><i class="fa-regular fa-clock"></i> 8h00 - 21h00</p>
        </div>
        <div class="bocongthuong">
          <p>
            <img
              src="http://online.gov.vn/Content/EndUser/LogoCCDVSaleNoti/logoSaleNoti.png"
              alt="logo bộ công thương"
              width="20%" />
          </p>
          <p>
            sweetoria.id.vn - GPĐKKD số: 01E8015819 do UBND Quận Đống Đa cấp
            ngày 22/04/2013 tại Hà Nội.
          </p>
        </div>

        <img src="{{ asset('public/frontend/client/form/img_form/logo_footer.png') }}" alt="logo sweetoria" width="10%" />
      </div>
    </footer> -->
  </div>

  <!-- Link tới file JS -->
  <script src="{{ asset('public/frontend//js/validation.js') }}"></script>
</body>

</html>