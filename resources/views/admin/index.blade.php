@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>

</head>
<body>

@section('content')
<h4 class="text-lg font-bold">Welcome.. {{ Auth::user()->name }}</h4> 
<h1 class="text-3xl font-bold mb-4">Daftar Member</h1>
<a href="{{ route('members.createMultiple') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Tambah Member</a>

<br><br>
<!-- Dropdown Sort -->
<label class="block text-gray-700 text-sm font-bold mb-2">Urutkan Nama:</label>
<select id="sortSelect" onchange="loadMembers()" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
    <option value="az">A-Z</option>
    <option value="za">Z-A</option>
</select>

<table class="table-auto w-full">
    <thead>
        <tr>
            <th class="px-4 py-2">ID</th>
            <th class="px-4 py-2">Foto</th>
            <th class="px-4 py-2">Nama</th>
            <th class="px-4 py-2">Tanggal Lahir</th>
            <th class="px-4 py-2">Golongan Darah</th>
            <th class="px-4 py-2">Horoskop</th>
            <th class="px-4 py-2">Tinggi Badan</th>
            <th class="px-4 py-2">Nama Panggilan</th>
            <th class="px-4 py-2">Role</th>
            <th class="px-4 py-2">Twitter</th>
            <th class="px-4 py-2">Instagram</th>
            <th class="px-4 py-2">Aksi</th>
        </tr>
    </thead>
    <tbody id="member-table-body">
        <tr><td colspan="9" class="px-4 py-2">Loading data...</td></tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="9" class="px-4 py-2">
                <a href="{{ route('members.export') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Download Excel</a>
            </td>
        </tr>
    </tfoot>
</table>
@endsection

<script>
    function loadMembers() {
        fetch('/api/members')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('member-table-body');
                tableBody.innerHTML = '';

                if (data.data && data.data.length > 0) {
                    const sortOption = document.getElementById('sortSelect').value;

                    data.data.sort((a, b) => {
                        const rolePriority = (role) => role === 'anggota' ? 0 : 1;
                        const roleA = rolePriority(a.role);
                        const roleB = rolePriority(b.role);

                        if (roleA !== roleB) {
                            return roleA - roleB;
                        }

                        let nameA = a.name.toLowerCase();
                        let nameB = b.name.toLowerCase();

                        return sortOption === 'az' ? nameA.localeCompare(nameB) : nameB.localeCompare(nameA);
                    });

                    data.data.forEach(member => {
                        const row = document.createElement('tr');
                        const fotoUrl = member.foto ? `/storage/foto/${member.foto}` : null;
                        const timestamp = member.updated_at ? `?v=${new Date(member.updated_at).getTime()}` : '';
                        row.innerHTML = `
                            <td class="px-4 py-2">${member.id}</td>
                            <td class="px-4 py-2">
                                ${fotoUrl ? `<img src="${fotoUrl + timestamp}" width="80" class="rounded" alt="Foto">` : 'Tidak ada foto'}
                            </td>
                            <td class="px-4 py-2">${member.name}</td>
                            <td class="px-4 py-2">${member.tanggal_lahir}</td>
                            <td class="px-4 py-2">${member.golongan_darah}</td>
                            <td class="px-4 py-2">${member.horoskop}</td>
                            <td class="px-4 py-2">${member.tinggi_badan} cm</td>
                            <td class="px-4 py-2">${member.nama_panggilan}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded ${member.role === 'trainee' ? 'bg-yellow-400' : 'bg-green-500'} text-white">
                                    ${member.role === 'trainee' ? 'Trainee' : 'Anggota'}
                                </span>
                            </td>
                            <td class="px-4 py-2">${member.twitter}</td>
                            <td class="px-4 py-2">${member.instagram}</td>
                            <td class="px-4 py-2">
                                <button onclick="deleteMember(${member.id})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Hapus</button>
                            </td>
                            
                        `;
                        tableBody.appendChild(row);
                    });
                } else {
                    tableBody.innerHTML = '<tr><td colspan="9" class="px-4 py-2">Tidak ada data member.</td></tr>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('member-table-body').innerHTML = '<tr><td colspan="9" class="px-4 py-2">Gagal mengambil data.</td></tr>';
            });
    }

    function deleteMember(id) {
        if (confirm('Apakah Anda yakin ingin menghapus member ini?')) {
            fetch(`/api/members/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                loadMembers();
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat menghapus member.');
            });
        }
    }

    document.addEventListener('DOMContentLoaded', loadMembers);
</script>
</body>
</html>