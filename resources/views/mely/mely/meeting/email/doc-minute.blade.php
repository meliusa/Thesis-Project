<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notulensi Rapat</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .title {
            font-size: 28px;
            font-weight: bold;
            color: #333333;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .meta-data {
            font-size: 14px;
            color: #666666;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .meta-data td {
            padding: 12px;
            border-bottom: 1px solid #eeeeee;
        }

        .agenda,
        .decision,
        .qna {
            margin-bottom: 30px;
        }

        .agenda h3,
        .decision h3,
        .qna h3 {
            font-size: 20px;
            font-weight: bold;
            color: #333333;
            margin-bottom: 15px;
        }

        .agenda p,
        .decision p,
        .qna p {
            font-size: 14px;
            color: #666666;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .qna-item {
            border-left: 3px solid #333333;
            padding-left: 12px;
            margin-bottom: 20px;
        }

        .qna-item strong {
            font-weight: bold;
            color: #333333;
            display: block;
            margin-bottom: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #888888;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="title">Notulensi Rapat</div>
        </div>

        <table class="meta-data">
            <tr>
                <td><strong>Judul Rapat:</strong></td>
                <td>{{ $submissionModule->title }}</td>
            </tr>
            <tr>
                <td><strong>Tanggal & Jam Rapat:</strong></td>
                <td>{{ \Carbon\Carbon::parse($submissionModule->date)->format('d-m-Y') }},
                    {{ \Carbon\Carbon::parse($submissionModule->time)->format('H:i') }} WIB</td>
            </tr>
            <tr>
                <td><strong>Tipe Rapat:</strong></td>
                <td>{{ $submissionModule->type }}</td>
            </tr>
            <tr>
                <td><strong>Lokasi Rapat:</strong></td>
                <td>{{ $submissionModule->location }}</td>
            </tr>
            <tr>
                <td><strong>Notulis Rapat:</strong></td>
                <td>{{ $docMinute->user->nama }}</td>
            </tr>
        </table>

        <div class="agenda">
            <h3>Agenda Rapat:</h3>
            <p>{!! nl2br(e($submissionModule->agenda)) !!}</p>
        </div>

        <div class="decision">
            <h3>Keputusan Rapat:</h3>
            <p>{!! nl2br(e($docMinute->decisions)) !!}</p>
        </div>

        <div class="qna">
            <h3>Tanya Jawab Rapat:</h3>
            @foreach ($docMinuteQnaDetails as $qna)
            <div class="qna-item">
                <strong>Penanya:</strong>
                <p>{{ $qna->asker }}</p> <br>
                <strong>Pertanyaan:</strong>
                <p>{{ $qna->question }}</p> <br>
                <strong>Jawaban:</strong>
                <p>{{ $qna->answer }}</p>
            </div>
            @endforeach
        </div>

        <div class="footer">
            Notulensi ini distribusikan pada {{ \Carbon\Carbon::now()->isoFormat('D MMMM YYYY [pukul] HH:mm') }}
        </div>
    </div>
    <span style="opacity: 0">{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</span>
</body>

</html>
