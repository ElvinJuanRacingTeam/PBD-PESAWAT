<!DOCTYPE html>
<html>
<head><title>Tambah Penumpang</title></head>
<body>

<h2>Tambah Penumpang</h2>

<form action="/penumpang" method="POST">
@csrf

<input name="nik" placeholder="NIK"><br>
<input name="nama" placeholder="Nama"><br>

<select name="jenis_kelamin">
    <option value="Male">Male</option>
    <option value="Female">Female</option>
</select><br>

<input type="date" name="tgl_lahir"><br>
<input name="no_telp" placeholder="No Telp"><br>
<input name="email" placeholder="Email"><br>
<textarea name="alamat" placeholder="Alamat"></textarea><br>

<button type="submit">Simpan</button>
</form>

</body>
</html>
