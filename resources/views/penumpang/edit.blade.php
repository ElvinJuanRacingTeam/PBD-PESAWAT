<!DOCTYPE html>
<html>
<head><title>Edit Penumpang</title></head>
<body>

<h2>Edit Penumpang</h2>

<form action="/penumpang/{{ $penumpang->id }}" method="POST">
@csrf
@method('PUT')

<input name="nik" value="{{ $penumpang->nik }}"><br>
<input name="nama" value="{{ $penumpang->nama }}"><br>

<select name="jenis_kelamin">
    <option value="Male" {{ $penumpang->jenis_kelamin=='Male'?'selected':'' }}>Male</option>
    <option value="Female" {{ $penumpang->jenis_kelamin=='Female'?'selected':'' }}>Female</option>
</select><br>

<input type="date" name="tgl_lahir" value="{{ $penumpang->tgl_lahir }}"><br>
<input name="no_telp" value="{{ $penumpang->no_telp }}"><br>
<input name="email" value="{{ $penumpang->email }}"><br>
<textarea name="alamat">{{ $penumpang->alamat }}</textarea><br>

<button type="submit">Update</button>
</form>

</body>
</html>
