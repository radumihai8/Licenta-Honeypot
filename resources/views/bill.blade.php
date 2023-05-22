<!DOCTYPE html>
<html>
<head>
    <title>Bill</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .content {
            width: 70%;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h2 {
            color: #6c757d;
            margin-bottom: 20px;
        }
        p {
            color: #343a40;
            margin-bottom: 10px;
            line-height: 1.6;
        }
        p strong {
            color: #495057;
        }
    </style>
</head>
<body>
<div class="content">
    <h2>Order #{{ $order->id }}</h2>
    <p><strong>User ID:</strong> {{ $order->user_id }}</p>
    <p><strong>Address:</strong> {{ $order->address }}</p>
    <p><strong>City:</strong> {{ $order->city }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p><strong>AWB:</strong> {{ $order->awb }}</p>
</div>
</body>
</html>
