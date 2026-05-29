<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>
        Laporan Peminjaman
    </title>

    <style>

        body{
            font-family:Arial, sans-serif;
        }

        h2{
            text-align:center;
            margin-bottom:20px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th,
        table td{
            border:1px solid #000;
            padding:8px;
            font-size:12px;
        }

        table th{
            background:#eee;
        }

    </style>

</head>
<body>

    <h2>
        📚 Laporan Peminjaman Buku
    </h2>

    <table>

        <thead>

            <tr>

                <th>No</th>
                <th>User</th>
                <th>Buku</th>
                <th>Status</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>

            </tr>

        </thead>

        <tbody>


            <tr>

                <td>
                    {{ $loop->iteration }}
                </td>

                <td>
                    {{ $borrowing->user->name }}
                </td>

                <td>
                    {{ $borrowing->book->title }}
                </td>

                <td>
                    {{ $borrowing->status }}
                </td>

                <td>
                    {{ $borrowing->created_at->format('d M Y') }}
                </td>

                <td>

                    {{ $borrowing->return_date
                        ? \Carbon\Carbon::parse($borrowing->return_date)->format('d M Y')
                        : '-' }}

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</body>
</html>