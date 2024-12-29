<!DOCTYPE html>
<html>
<head>
    <title>Your OTP Code</title>
    <link rel="icon" href="{{ asset('public/frontend/admin/images/logo.png') }}" type="image/x-icon">
</head>
<body>
    <h1>Your OTP Code is: {{ $otp }}</h1>
    <p>This code will expire in 5 minutes.</p>
</body>
</html>
