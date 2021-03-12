<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
</head>
<body style="alignment-baseline: center;">
<h3>Order #{{ $order->id }}</h3>
<h5>Contact: {{ $order->contact->first_name }} {{ $order->contact->last_name }} | Company: {{ $order->company->name }}</h5>
<table border="1" style="width: 690px; text-align: center">
    <thead>
    <th>ID</th>
    <th>Product</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Sub total</th>
    </thead>
    <tbody>
    @foreach($order->items as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->product }}</td>
            <td>{{ $item->quantity }}</td>
            <td>{{ $item->price }}</td>
            <td>£ {{ $item->price * $item->quantity }}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="4">Total</td>
        <td>£ {{ $order->total_price }}</td>
    </tr>
    </tbody>
</table>
</body>
</html>
