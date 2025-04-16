<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Songs dari Setlist 1</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="h-full">
    <div class="p-4 max-w-5xl mx-auto">
        <h1 class="text-3xl font-bold mb-4">Daftar Songs dari Setlist 1</h1>

        <button onclick="window.history.back()" class="mb-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Kembali
        </button>

        <table id="songs-table" class="table-auto w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2">Track Number</th>
                    <th class="border border-gray-300 px-4 py-2">Title</th>
                    <th class="border border-gray-300 px-4 py-2">Duration</th>
                </tr>
            </thead>
            <tbody id="songs-body">
                <tr><td colspan="3" class="px-4 py-2">Loading...</td></tr>
            </tbody>
        </table>
    </div>

    <script>
        function loadSongs() {
            fetch('/api/setlists/1')
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('songs-body');
                    tableBody.innerHTML = '';

                    if (data.success && data.data && data.data.songs && data.data.songs.length > 0) {
                        data.data.songs.forEach(song => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td class="border border-gray-300 px-4 py-2">${song.track_number}</td>
                                <td class="border border-gray-300 px-4 py-2">${song.title}</td>
                                <td class="border border-gray-300 px-4 py-2">${song.duration}</td>
                            `;
                            tableBody.appendChild(row);
                        });
                    } else {
                        tableBody.innerHTML = '<tr><td colspan="3" class="px-4 py-2">Tidak ada data lagu.</td></tr>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    const tableBody = document.getElementById('songs-body');
                    tableBody.innerHTML = '<tr><td colspan="3" class="px-4 py-2">Gagal mengambil data.</td></tr>';
                });
        }

        document.addEventListener('DOMContentLoaded', loadSongs);
    </script>
</body>
</html>
