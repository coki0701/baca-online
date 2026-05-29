<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <style>
        body{
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #111;
        }

        .header{
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #111;
            padding-bottom: 10px;
        }

        .header h2{
            margin: 0;
            font-size: 22px;
        }

        .header p{
            margin: 5px 0 0;
            font-size: 12px;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th{
            background: #1e293b;
            color: white;
            padding: 9px;
            border: 1px solid #111;
            text-align: left;
        }

        td{
            padding: 8px;
            border: 1px solid #111;
        }

        .text-center{
            text-align: center;
        }

        .footer{
            margin-top: 25px;
            text-align: right;
            font-size: 11px;
        }
    </style>
</head>

<body>

    <div class="header">
        <h2>Laporan Pengunjung Website</h2>
        <p>Perpustakaan Digital</p>
        <p>Tanggal Cetak: {{ date('d-m-Y') }}</p>
    </div>

    <table>

        <thead>

            <tr>

                <th width="40" class="text-center">No</th>

                <th>IP Address</th>

                <th width="140" class="text-center">
                    Tanggal Kunjungan
                </th>

                <th width="100" class="text-center">
                    Waktu
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($visitors as $visitor)

            <tr>

                <td class="text-center">
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $visitor->ip_address }}
                </td>

                <td class="text-center">
                    {{ $visitor->visit_date }}
                </td>

                <td class="text-center">
                    {{ $visitor->created_at->format('H:i') }}
                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <div class="footer">
        Dicetak oleh Admin - {{ date('d-m-Y H:i') }}
    </div>

</body>
</html>