<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Perubahan Status</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border: 2px solid #dddddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            padding: 30px;
            text-align: center;
        }

        h2 {
            color: #333333;
            margin-bottom: 10px;
            margin-top: 0;
        }

        p {
            color: #666666;
            line-height: 1.6;
            margin-bottom: 15px;
            text-align: justify;
        }

        .timestamp {
            color: #999999;
            font-style: italic;
            margin-top: 20px;
            text-align: center;
        }

        .button {
            text-align: center;
            margin-top: 20px;
        }

        .button a {
            display: inline-block;
            padding: 12px 24px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button a:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<body>
    <div class="container">
        <h2>Notifikasi Perubahan Status</h2>
        <p>Permohonan atau agenda rapat Anda telah mengalami perubahan status. Silakan klik tombol di bawah untuk masuk
            ke aplikasi terkait.</p>
        <div class="button">
            <a href="{{ route('submission-modules.index') }}" target="_blank">Buka Aplikasi</a>
        </div>
        <p>Ini adalah notifikasi otomatis yang dikirimkan kepada Anda. Harap tidak membalas email ini.</p>
        <div class="timestamp">Waktu notifikasi: {{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</div>
    </div>
</body>

</html>
