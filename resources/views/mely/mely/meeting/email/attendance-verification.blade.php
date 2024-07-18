<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Kehadiran Rapat</title>
    <style>
        /* CSS Inline Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }

        .info {
            margin-bottom: 30px;
        }

        .info p {
            margin: 8px 0;
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

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://via.placeholder.com/1200x800');
            /* Ganti dengan URL gambar latar belakang yang sesuai */
            background-size: cover;
            background-position: center;
            filter: blur(8px);
            z-index: -1;
        }

    </style>
</head>

<body>
    <div class="background-image"></div>
    <div class="container">
        <div class="header">
            <h2 class="title">Konfirmasi Kehadiran Rapat</h2>
        </div>
        <div class="info">
            <p><strong>Pemimpin Rapat:</strong> {{ $submissionModule->user->nama }}</p>
            <p><strong>Judul Rapat:</strong> {{ $submissionModule->title }}</p>
            <p><strong>Tujuan Rapat:</strong> {{ $submissionModule->purpose }}</p>
            <p><strong>Agenda Rapat:</strong> {{ $submissionModule->agenda }}</p>
            <p><strong>Tanggal dan Waktu Rapat:</strong>
                {{ \Carbon\Carbon::parse($submissionModule->date)->format('d-m-Y') }}
                ,
                {{ \Carbon\Carbon::parse($submissionModule->time)->format('H:i') }} WIB</p>
            <p><strong>Durasi Rapat:</strong> {{ $submissionModule->duration }}</p>
            <p><strong>Tipe Rapat:</strong> {{ $submissionModule->type }}</p>
            <p><strong>Lokasi Rapat:</strong>
                @if ($submissionModule->type == 'Daring')
                @php
                $url = $submissionModule->location;
                // Memastikan URL dimulai dengan 'http://' atau 'https://'
                if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                // Jika tidak dimulai dengan http:// atau https://, tampilkan pesan "Link Invalid"
                echo '<span class="fw-bold text-danger fs-6">Tautan tidak valid. (Harus diawali dengan http atau
                    https)</span>';
                } else {
                // Jika dimulai dengan http:// atau https://, tampilkan tautan yang valid
                echo '<a href="' . $url . '" class="fw-bold fs-6" target="_blank">' . $url . '</a>';
                }
                @endphp
                @else
                <span class="fw-bold text-gray-800 fs-6">{{ $submissionModule->location }}</span>
                @endif
            </p>
            <p><strong>Link Dokumen Pendukung Rapat:</strong>
                @php
                $url = $submissionModule->supporting_document;
                // Memastikan URL dimulai dengan 'http://' atau 'https://'
                if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                // Jika tidak dimulai dengan http:// atau https://, tampilkan pesan "Link Invalid"
                echo '<span class="fw-bold text-danger fs-6">Tautan tidak valid. (Harus diawali dengan http atau
                    https)</span>';
                } else {
                // Jika dimulai dengan http:// atau https://, tampilkan tautan yang valid
                echo '<a href="' . $url . '" class="fw-bold fs-6" target="_blank">' . $url . '</a>';
                }
                @endphp
            </p>
            <p><strong>Nota Bene Rapat:</strong> {{ $submissionModule->postscript }}</p>
        </div>
        <div class="button">
            <a href="{{ route('submission-modules.attendance-confirmation', ['id' => $submissionModule->id]) }}"
                target="_blank">Konfirmasi Kehadiran</a>
        </div>
    </div>
    <span style="opacity: 0">{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</span>
</body>

</html>
