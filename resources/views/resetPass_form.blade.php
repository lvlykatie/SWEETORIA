<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sweetoria Reset Password</title>
    <link rel="stylesheet" href="{{ asset('public/frontend/client/form/css/styleform.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />

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
      <header>
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
              <!-- Sử dụng icon giỏ hàng của Font Awesome -->
              <a href="#"><i class="fa-solid fa-cart-shopping fa-lg"></i></a>
            </li>
            <li>
              <!-- Sử dụng icon giỏ hàng của Font Awesome -->
              <a href="#"><i class="fa-solid fa-user fa-lg"></i></a>
            </li>
          </ul>
        </nav>
      </header>

      <div class="form-container">
        <div class="form-box">
          <h1>Reset Pass</h1>
          <img src="{{ asset('public/frontend/client/form/img_form/nen_form.jpg') }}" alt="Logo sweetoria form" width="50%" />

                   <!-- Hiển thị thông báo lỗi nếu có -->
         @if ($errors->any())
              <div class="alert alert-danger">
                 <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                 @endforeach
                </ul>
              </div>
         @endif

         <br>


          <form action="{{ url('/resetpass') }}" method="POST" autocomplete="on" id="resetpassForm" validate required>
          @csrf

          <input type="hidden" name="userEmail" value="{{ session('email') }}" /> <!-- Sử dụng email từ session -->

          <div class="form-group">
              <label for="new password" style="text-align: left"
                >Password</label
              >
              <input type="password" id="new password" name="new password"  placeholder="********" />
            </div>

            <div class="form-group">
              <label for="confirm new pass" style="text-align: left"
                >Confirm</label
              >
              <input
                type="password"
                id="confirm new pass"
                name="confirm new pass"
                placeholder="Confirm your new password"
              />
            </div>

            <button type="submit">Save</button>
          </form>
        </div>
      </div>

      <footer>
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
                width="20%"
              />
            </p>
            <p>
              sweetoria.id.vn - GPĐKKD số: 01E8015819 do UBND Quận Đống Đa cấp
              ngày 22/04/2013 tại Hà Nội.
            </p>
          </div>

          <img src="{{ asset('public/frontend/client/form/img_form/logo_footer.png') }}" alt="logo sweetoria" width="10%" />
        </div>
      </footer>
    </div>

    <!-- Kết nối file JS ở đây -->
    <script src="{{ asset('public/frontend/js/validation.js') }}"></script>
  </body>
</html>
