
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Invoice</title>
</head>
<body>
    <div>
        <h1>Order Invoice</h1>
        <p>This is the invoice content:</p>
        <div>
            <!-- Display the invoice content -->
            {!! $data['invoiceContent'] !!}
        </div>
        <p>Email sent to: {{ $data['emailReceiver'] }}</p>
    </div>
</body>
</html>
