<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sweetoria Forget Password</title>
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
<link rel="icon" href="{{ asset('public/frontend/admin/images/logo.png') }}" type="image/x-icon">
  </head>
  <body>
    <div class="container">
      

      <div class="form-container">
        <div class="form-box">
          <h1>Forget Pass</h1>
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

          <form action="{{ url('/forgetpass') }}" method="POST" autocomplete="on" id="forgetpassForm" validate required>
          @csrf
          
            <div class="form-group">
              <label for="userEmail" style="text-align: left">Email</label>
              <input
                type="email"
                id="userEmail"
                name="userEmail" 
                placeholder="Enter your Email"
                required

              />
            </div>

            <button type="submit">Send OTP</button>

            <div class="bt_back">
              <button type="button" onclick="goBack()">Back</button>
            </div>
          </form>
        </div>
      </div>


    </div>

    <script>
  function goBack() {
    window.location.href = "{{ url('/signin') }}"; // Chuyển đến trang '/signin'
  }
</script>
<!-- Kết nối file JS ở đây -->
<script src="{{ asset('public/frontend/js/validation.js') }}"></script>

  </body>
</html>

