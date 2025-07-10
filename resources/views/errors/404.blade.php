<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>404 Not Found</title>
    <style>
        body {
            margin: 0;
            background: linear-gradient(135deg, #8B0000, #000000);
            color: #FF6347;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            max-width: 600px;
            padding: 2rem;
            border: 2px solid #FF6347;
            border-radius: 12px;
            background-color: rgba(0, 0, 0, 0.7);
        }
        h1 {
            font-size: 6rem;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px #330000;
        }
        p {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            text-shadow: 1px 1px 3px #330000;
        }
        a {
            color: #FF6347;
            text-decoration: none;
            font-weight: bold;
            border: 2px solid #FF6347;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        a:hover {
            background-color: #FF6347;
            color: #000000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>404 Not Found</h1>
        <p>Halaman yang Anda cari tidak ditemukan.</p>
        <br>
        <a href="{{ url('/') }}">Kembali ke Beranda</a>
    </div>
</body>
</html>
