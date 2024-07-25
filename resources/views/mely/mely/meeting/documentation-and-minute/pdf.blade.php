<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notulensi Rapat</title>
    <style>
        /* CSS Inline */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.6;
            padding: 10px;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            margin-bottom: 20px;
        }

        .title {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            /* Menengahkan judul */
        }

        .meta-data {
            font-size: 12px;
            color: #555;
            margin-bottom: 15px;
        }

        .meta-data table {
            width: 100%;
        }

        .meta-data td {
            padding: 5px;
        }

        .agenda {
            margin-bottom: 15px;
            text-align: left;
            /* Justifikasi isi agenda */
        }

        .agenda h3 {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .agenda p {
            font-size: 12px;
            color: #555;
            margin-bottom: 5px;
        }

        .decision {
            margin-bottom: 15px;
            text-align: left;
            /* Justifikasi isi keputusan */
        }

        .decision h3 {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .decision p {
            font-size: 12px;
            color: #555;
            margin-bottom: 5px;
        }

        .qna {
            margin-bottom: 15px;
            text-align: left;
            /* Justifikasi isi tanya jawab */
        }

        .qna h3 {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .qna p {
            font-size: 12px;
            color: #555;
            margin-bottom: 5px;
        }

        .signatures {
            width: 100%;
            margin-top: 30px;
            font-size: 12px;
            border-collapse: collapse;
        }

        .signature-box {
            padding: 10px;
        }

        .left {
            text-align: left;
            width: 50%;
        }

        .right {
            text-align: right;
            width: 50%;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="title">Notulensi Rapat</div>
            <table class="meta-data">
                <tr>
                    <td><strong>Judul Rapat:</strong></td>
                    <td>{{ $submissionModule->title }}</td>
                </tr>
                <tr>
                    <td><strong>Tanggal & Jam:</strong></td>
                    <td>{{ \Carbon\Carbon::parse($submissionModule->date)->format('d-m-Y') }},
                        {{ \Carbon\Carbon::parse($submissionModule->time)->format('H:i') }} WIB</td>
                </tr>
                <tr>
                    <td><strong>Tipe Rapat:</strong></td>
                    <td>{{ $submissionModule->type }}</td>
                </tr>
                <tr>
                    <td><strong>Lokasi Rapat:</strong></td>
                    @if ($submissionModule->type == 'Daring')
                    @php
                    $url = $submissionModule->location;
                    // Memastikan URL dimulai dengan 'http://' atau 'https://'
                    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
                    // Jika tidak dimulai dengan http:// atau https://, tampilkan pesan "Link Invalid"
                    echo '<td style="color: red;">Tautan tidak valid. (Harus diawali dengan http atau https)</td>';
                    } else {
                    // Jika dimulai dengan http:// atau https://, tampilkan tautan yang valid
                    echo '<td>' . $url . '</td>';
                    }
                    @endphp
                    @else
                    <td>{{ $submissionModule->location }}</td>
                    @endif
                </tr>
                <tr>
                    <td><strong>Notulis Rapat:</strong></td>
                    <td>{{ $docMinute->user->nama }}</td>
                </tr>
            </table>
        </div>

        <div class="agenda">
            <h3>Agenda Rapat:</h3>
            <p>{!! nl2br(e($submissionModule->agenda)) !!}</p>
        </div>

        <div class="decision">
            <h3>Keputusan Rapat:</h3>
            <p>{!! nl2br(e($docMinute->decisions)) !!}</p>
        </div>

        <div class="qna">
            <h3>Tanya Jawab:</h3>
            @foreach ($docMinuteQnaDetails as $qna)
            <p class="mb-3">
                <strong>Asker:</strong> {{ $qna->asker }} <br>
                <strong>Pertanyaan:</strong> {{ $qna->question }} <br>
                <strong>Jawaban:</strong> {{ $qna->answer }}
            </p>
            @endforeach
        </div>

        <table class="signatures">
            <tr>
                <td class="signature-box left">
                    <p>Tanda tangan,</p>
                    <p>(Notulis Rapat)</p>
                    <p>______________________</p>
                    <p>{{ $docMinute->user->nama }}</p>
                </td>
                <td class="signature-box right">
                    <p>Tanda tangan,</p>
                    <p>(Pemimpin Rapat)</p>
                    <p>______________________</p>
                    <p>{{ $submissionModule->user->nama }}</p>
                </td>
            </tr>
        </table>

    </div>
</body>

</html>
