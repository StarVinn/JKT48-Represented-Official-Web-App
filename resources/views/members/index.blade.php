@extends('layouts.app')

<!DOCTYPE html>
<html>
<head>
    
</head>
<body>

    @section('content')
    <h4>Welcome.. {{ Auth::user()->name }}</h4>    <h1>Daftar Member</h1>
    <a href="{{ route('members.createMultiple') }}">Tambah Member</a>

    <br><br>
    <!-- Dropdown Sort -->
    <label>Urutkan Nama:</label>
    <select id="sortSelect" onchange="loadMembers()">
        <option value="az">A-Z</option>
        <option value="za">Z-A</option>
    </select>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Golongan Darah</th>
                <th>Horoskop</th>
                <th>Tinggi Badan</th>
                <th>Nama Panggilan</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="member-table-body">
            <tr><td colspan="9">Loading data...</td></tr>
        </tbody>
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

                        // Sort dengan prioritas role Anggota dulu, lalu nama
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

                        // Tampilkan data ke tabel
                        data.data.forEach(member => {
                            const row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${member.id}</td>
                                <td>${member.foto ? `<img src="/storage/foto/${member.foto}" width="80" class="img-thumbnail" alt="Foto">` : 'Tidak ada foto'}</td>
                                <td>${member.name}</td>
                                <td>${member.tanggal_lahir}</td>
                                <td>${member.golongan_darah}</td>
                                <td>${member.horoskop}</td>
                                <td>${member.tinggi_badan} cm</td>
                                <td>${member.nama_panggilan}</td>
                                <td>
                                    <span style="padding:5px; border-radius:5px; background:${member.role === 'trainee' ? '#ffc107' : '#28a745'}; color:white;">
                                        ${member.role === 'trainee' ? 'Trainee' : 'Anggota'}
                                    </span>
                                </td>
                                <td>
                                    <button onclick="deleteMember(${member.id})" class="btn btn-danger btn-sm">Hapus</button>
                                </td>
                            `;
                            tableBody.appendChild(row);
                        });
                    } else {
                        tableBody.innerHTML = '<tr><td colspan="9">Tidak ada data member.</td></tr>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('member-table-body').innerHTML = '<tr><td colspan="9">Gagal mengambil data.</td></tr>';
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