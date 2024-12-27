<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán thành công</title>
</head>

<body>
    @if(isset($message))
        <div class="alert alert-info">
            {{ $message }}
        </div>
    @endif

    <h1>SWEETORIA sorry!</h1>
    <a href="{{ url('/cart') }}">Back to your Cart</a>

</body>
</html>