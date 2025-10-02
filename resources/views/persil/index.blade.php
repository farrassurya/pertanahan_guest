<!DOCTYPE html>
<html>
<head>
    <title>Data Persil - Guest</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background: #f4f6f7; }
        h1 { text-align: center; }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th { background: #3498db; color: white; }
        tr:nth-child(even) { background: #ecf0f1; }
    </style>
</head>
<body>
    <h1>📑 Daftar Persil (Guest)</h1>
    <table>
        <thead>
            <tr>
                <th>Kode Persil</th>
                <th>Pemilik</th>
                <th>Luas (m²)</th>
                <th>Penggunaan</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($persil as $p)
                <tr>
                    <td>{{ $p['kode_persil'] }}</td>
                    <td>{{ $p['pemilik'] }}</td>
                    <td>{{ $p['luas_m2'] }}</td>
                    <td>{{ $p['penggunaan'] }}</td>
                    <td>{{ $p['alamat'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
