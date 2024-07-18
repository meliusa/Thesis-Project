<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Kehadiran Rapat</title>
    <style>
        /* Gaya untuk email */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1,
        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 20px;
            text-align: justify;
            /* Justifikasi teks untuk penampilan formal */
        }

        .btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .signature {
            margin-top: 30px;
            font-style: italic;
        }

        .agenda {
            margin-top: 20px;
            background-color: #f9f9f9;
            padding: 10px 20px;
            border-left: 4px solid #007bff;
        }

        .agenda p {
            margin-bottom: 10px;
        }

    </style>
</head>

<body>
    <div class="container">
        <h1>Konfirmasi Kehadiran Rapat</h1>
        <p>Kepada Yth, <br> Bapak/Ibu.</p>
        <p>Anda telah diundang untuk hadir dalam rapat berikut:</p>

        <div class="agenda">
            <p><strong>Nama Penerima:</strong> {{ $userName }}</p>
            <p><strong>Judul Topik:</strong> {{ $agenda->topic->title }}</p>
            <p><strong>Deskripsi Topik:</strong> {{ $agenda->topic->description }}</p>
            <p><strong>Tanggal dan Jam:</strong> {{ \Carbon\Carbon::parse($agenda->date)->format('d-m-Y') }},
                {{ \Carbon\Carbon::parse($agenda->time)->format('H:i') }}</p>
            <p><strong>Tipe Rapat:</strong> {{ $agenda->meeting_type }}</p>
            <p><strong>Lokasi Rapat/Link Rapat:</strong> @if ($agenda->meeting_type == 'Daring') <a
                    href="{{ $agenda->meeting_address }}">{{ $agenda->meeting_address }}</a> @else
                {{ $agenda->meeting_address }}
                @endif
            </p>
        </div>

        <br>
        <p>Mohon konfirmasi kehadiran Anda dengan mengeklik tombol di bawah ini:</p>
        <a href="{{ route('agendas.attendance-confirmation', ['id' => $agenda->id]) }}" class="btn">Konfirmasi
            Kehadiran</a>
        <br>
        <br>
        <p>Pastikan notifikasi konfirmasi kehadiran berhasil. Jika tombol di atas tidak berfungsi atau butuh bantuan, silakan hubungi nomor di bawah:</p>
        <p>Nomor: {{ $adminNumber }}</p>
        <p>Demikian kami sampaikan, terima kasih.</p>
        <p class="signature">Hormat Kami,<br>PT Wijaya Kusumo</p>
        <!-- this ensures Gmail doesn't trim the email -->
        <span style="opacity: 0">{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</span>
    </div>
</body>

</html>
