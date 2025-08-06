<!DOCTYPE html>
<html>
<head>
    <title>Tambah Banyak Member</title>
</head>
<body>
    <h1>Tambah Banyak Member</h1>

    <form method="POST" action="{{ route('members.storeMultiple') }}" enctype="multipart/form-data">
        @csrf

        <div id="members-container">
            <div class="member-form">
                <h4>Data Member</h4>
                <input type="text" name="members[0][name]" placeholder="Nama" required>
                <input type="date" name="members[0][tanggal_lahir]" required>

                {{-- Dropdown Golongan Darah --}}
                <select name="members[0][golongan_darah]" required>
                    <option value="">-- Pilih Golongan Darah --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>

                {{-- Dropdown Horoskop --}}
                <select name="members[0][horoskop]" required>
                    <option value="">-- Pilih Horoskop --</option>
                    <option value="Aries">Aries</option>
                    <option value="Taurus">Taurus</option>
                    <option value="Gemini">Gemini</option>
                    <option value="Cancer">Cancer</option>
                    <option value="Leo">Leo</option>
                    <option value="Virgo">Virgo</option>
                    <option value="Libra">Libra</option>
                    <option value="Scorpio">Scorpio</option>
                    <option value="Sagittarius">Sagittarius</option>
                    <option value="Capricorn">Capricorn</option>
                    <option value="Aquarius">Aquarius</option>
                    <option value="Pisces">Pisces</option>
                </select>

                {{-- Dropdown Tinggi Badan --}}
                <select name="members[0][tinggi_badan]" required>
                    <option value="">-- Pilih Tinggi Badan (cm) --</option>
                    @for ($i = 150; $i <= 200; $i++)
                        <option value="{{ $i }}">{{ $i }} cm</option>
                    @endfor
                </select>

                <input type="text" name="members[0][nama_panggilan]" placeholder="Nama Panggilan" required>
                <input type="text" name="members[0][twitter]" placeholder="Twitter" required>
                <input type="text" name="members[0][instagram]" placeholder="Instagram" required>

                {{-- Dropdown Role --}}
                <select name="members[0][role]" required>
                    <option value="anggota">Anggota</option>
                    <option value="trainee">Trainee</option>
                </select>

                <input type="file" name="members[0][foto]">
                <hr>
            </div>
        </div>

        <button type="button" onclick="addMemberForm()">Tambah Form Member</button>
        <br><br>
        <button type="submit">Simpan Semua Member</button>

        <a href="{{ url('/admin') }}">Back</a>
    </form>

    <script>
        let memberIndex = 1;

        function addMemberForm() {
            const container = document.getElementById('members-container');
            let tinggiBadanOptions = '';
            for (let i = 150; i <= 200; i++) {
                tinggiBadanOptions += `<option value="${i}">${i} cm</option>`;
            }

            const memberForm = `
                <div class="member-form">
                    <h4>Data Member</h4>
                    <input type="text" name="members[${memberIndex}][name]" placeholder="Nama" required>
                    <input type="date" name="members[${memberIndex}][tanggal_lahir]" required>

                    <select name="members[${memberIndex}][golongan_darah]" required>
                        <option value="">-- Pilih Golongan Darah --</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                    </select>

                    <select name="members[${memberIndex}][horoskop]" required>
                        <option value="">-- Pilih Horoskop --</option>
                        <option value="Aries">Aries</option>
                        <option value="Taurus">Taurus</option>
                        <option value="Gemini">Gemini</option>
                        <option value="Cancer">Cancer</option>
                        <option value="Leo">Leo</option>
                        <option value="Virgo">Virgo</option>
                        <option value="Libra">Libra</option>
                        <option value="Scorpio">Scorpio</option>
                        <option value="Sagittarius">Sagittarius</option>
                        <option value="Capricorn">Capricorn</option>
                        <option value="Aquarius">Aquarius</option>
                        <option value="Pisces">Pisces</option>
                    </select>

                    <select name="members[${memberIndex}][tinggi_badan]" required>
                        <option value="">-- Pilih Tinggi Badan (cm) --</option>
                        ${tinggiBadanOptions}
                    </select>

                    <input type="text" name="members[${memberIndex}][nama_panggilan]" placeholder="Nama Panggilan" required>
                    <input type="text" name="members[${memberIndex}][twitter]" placeholder="Twitter" required>
                    <input type="text" name="members[${memberIndex}][instagram]" placeholder="Instagram" required>

                    <select name="members[${memberIndex}][role]" required>
                        <option value="anggota">Anggota</option>
                        <option value="trainee">Trainee</option>
                    </select>

                    <input type="file" name="members[${memberIndex}][foto]">
                    <hr>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', memberForm);
            memberIndex++;
        }
    </script>
</body>
</html>
