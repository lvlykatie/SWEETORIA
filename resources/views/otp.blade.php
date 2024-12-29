<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <link rel="stylesheet" href="{{ asset('public/frontend/client/form/css/styleform.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <link rel="icon" href="{{ asset('public/frontend/admin/images/logo.png') }}" type="image/x-icon">
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
    <div class="form-container">
            <div class="form-box">
              <h1>Verify OTP</h1>
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
    
              <form action="{{ url('/otp') }}" method="POST" autocomplete="on" id="verifyOTP" validate required>
              @csrf
              <input type="hidden" name="userEmail" value="{{ session('email') }}">
                <div class="form-group">
                  <label for="otp" style="text-align: left">OTP</label>
                  <!-- name="user_email" them dong nay vaof input email neu dc-->
                  <input
                    type="text"
                    id="otp"
                    name="otp" 
                    placeholder="Enter your OTP"
                    required
    
                  />
                </div>
    
                <button type="submit">Verify</button>
    
              </form>
            </div>
          </div>
    
</div>




</body>
</html>