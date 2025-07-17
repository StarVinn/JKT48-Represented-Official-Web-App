@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-4">Daftar Setlist</h1>

<div class="overflow-x-auto w-full">
<table id="setlist-table" class="table-auto w-full border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border border-gray-300 px-4 py-2">ID</th>
            <th class="border border-gray-300 px-4 py-2">Foto</th>
            <th class="border border-gray-300 px-4 py-2">Judul</th>
            <th class="border border-gray-300 px-4 py-2">Artist</th>
            <th class="border border-gray-300 px-4 py-2">Production Year</th>
            <th class="border border-gray-300 px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody id="setlist-body">
        <tr><td colspan="5" class="px-4 py-2">Loading...</td></tr>
    </tbody>
</table>
</div>

<script>
    function loadSetlists() {
        fetch('/api/setlists')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('setlist-body');
                tableBody.innerHTML = '';

                if (data.data && data.data.length > 0) {
                    data.data.forEach(setlist => {
                        const imageUrl = setlist.image ? `/storage/foto/${setlist.image}` : null;
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td class="border border-gray-300 px-4 py-2">${setlist.id}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                ${imageUrl ? `<img src="${imageUrl}" alt="Foto" width="80" class="rounded">` : 'Tidak ada foto'}
                            </td>
                            <td class="border border-gray-300 px-4 py-2">${setlist.title}</td>
                            <td class="border border-gray-300 px-4 py-2">${setlist.artist}</td>
                            <td class="border border-gray-300 px-4 py-2">${setlist.production_year}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="/admin/songs/${setlist.id}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded block truncate max-w-full">
                                    Show Songs
                                </a>
                            </td>
                        `;
                        tableBody.appendChild(row);
                    });
                } else {
                    tableBody.innerHTML = '<tr><td colspan="5" class="px-4 py-2">Tidak ada data setlist.</td></tr>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                const tableBody = document.getElementById('setlist-body');
                tableBody.innerHTML = '<tr><td colspan="5" class="px-4 py-2">Gagal mengambil data.</td></tr>';
            });
    }

    document.addEventListener('DOMContentLoaded', loadSetlists);
</script>
@endsection
