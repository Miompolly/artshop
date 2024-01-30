{
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject }}</title>
</head>

<body style="font-family: 'Arial', sans-serif; background-color: #f4f4f4; color: #333; padding: 20px;">

    <div
        style="max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="color: #333; margin-bottom: 20px;">{{ $subject }}</h2>

        <p style="font-size: 16px; line-height: 1.6; color: #555;">{!! $body !!}</p>

        <p style="font-size: 14px; color: #777; margin-top: 20px;">Thank you,<br>ArtShop Ltd</p>
    </div>

</body>

</html>
}
