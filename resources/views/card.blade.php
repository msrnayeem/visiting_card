<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Card</title>
    <style>
        p {
            font-size: 10px;
        }
    </style>
</head>

<body>
    <div style="width: 70%; float: left;">
        <p>{{ $card->name }}</p>
        <p>{{ $card->email }}</p>
        <p>{{ $card->phone }}</p>
    </div>
    <div style="width: 20%; float: right; text-align: center; margin-top: 10px;">
        <img src="data:image/png;base64,{{ DNS2D::getBarcodePNG($card->name . PHP_EOL . $card->email . PHP_EOL . $card->phone, 'QRCODE') }}"
            style="display: inline-block;" height="40" width="35">
    </div>
</body>

</html>
