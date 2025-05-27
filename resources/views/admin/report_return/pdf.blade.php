<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan CPMI - {{ $user->username }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 30px;
            color: #000;
        }

        h2, h3 {
            margin-bottom: 10px;
            border-bottom: 1px solid #000;
            padding-bottom: 5px;
        }

        .section {
            margin-bottom: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        td, th {
            padding: 6px;
            border: 1px solid #000;
            vertical-align: top;
        }

        .label {
            width: 30%;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h2>Laporan Data CPMI</h2>
    <p><strong>Tanggal Cetak:</strong> {{ \Carbon\Carbon::now()->format('d M Y') }}</p>

    <div class="section">
        <h3>1. Data Pribadi</h3>
        <table>
            <tr>
                <td class="label">Nama</td>
                <td>{{ $user->username }}</td>
            </tr>
            <tr>
                <td class="label">No. Passport</td>
                <td>{{ $user->personalData->passport_number ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Tempat Lahir</td>
                <td>{{ $user->personalData->birth_place ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Lahir</td>
                <td>{{ $user->personalData->birth_date ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h3>2. Data Detail CPMI</h3>
        <table>
            <tr>
                <td class="label">Nama Agensi</td>
                <td>{{ $user->userDetails->agency_name ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Sponsor</td>
                <td>{{ $user->userDetails->sponsor ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Nomor Telepon</td>
                <td>{{ $user->userDetails->phone ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h3>3. Nilai Ujian</h3>
        <table>
            <tr>
                <td class="label">Nilai</td>
                <td>{{ $user->examScore->score ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Keterangan</td>
                <td>{{ $user->examScore->remarks ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Status Review</td>
                <td>{{ $user->examScore->review_status ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h3>4. Dokumen</h3>
        <table>
            <tr>
                <td class="label">Surat Izin</td>
                <td>{{ $user->userDocuments->permit_letter ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">SKCK</td>
                <td>{{ $user->userDocuments->police_clearancy ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Buku Nikah</td>
                <td>{{ $user->userDocuments->marriage_book ?? '-' }}</td>
            </tr>
        </table>
    </div>

    <p style="margin-top: 40px;">Dicetak otomatis oleh sistem pada {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}</p>

</body>
</html>
