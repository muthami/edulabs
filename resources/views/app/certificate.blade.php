<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $certificate->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap"
          rel="stylesheet">
    <style>
        .font {
            font-family: 'Righteous', Aerial, sans-serif;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .certificate {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-image: url("https://i.pinimg.com/474x/98/49/ec/9849eca55112667b95fb832270d4fec2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .certificate-header {
            text-align: center;
            margin-top: 40px;
            margin-bottom: 20px;
            font-family: 'Righteous', Aerial, sans-serif;
        }

        .certificate-header h2 {
            color: #333;
            font-size: 28px;
            margin: 10px 0;
        }

        .certificate-body {
            text-align: center;
            margin-bottom: 20px;
        }

        .certificate-body p {
            color: #555;
            font-size: 18px;
            margin: 10px 0;
        }

        .certificate-footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
            font-size: 14px;
        }

        .signature {
            display: inline-block;
            margin-top: 40px;
        }

        .signature img {
            width: 60%;
            height: auto;
        }
    </style>
</head>
<body>
<div class="certificate">
    <div class="certificate-header">
        <h2><u>{{ $certificate->title }}</u></h2>
    </div>
    <div class="certificate-body">
        <p>This certificate is awarded to</p>
        <h1 class="font">{{ optional($certificate->user)->first_name }} {{ optional($certificate->user)->last_name }}</h1>

        <p>for {{ $certificate->title }}</p>
        <p>on {{ date('F j, Y', strtotime($certificate->created_at)) }}</p>
    </div>
    <div class="certificate-footer">
        <p>Issued on {{ date('F j, Y') }}</p>
        <div class="signature">
            <img src="https://www.shutterstock.com/image-vector/fake-autograph-samples-handdrawn-signatures-260nw-2325821623.jpg"
                 alt="Signature">
            <p>Authorized Signature</p>
        </div>
    </div>
</div>
</body>
</html>
