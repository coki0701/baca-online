<!DOCTYPE html>
<html>
<head>
    <title>Upload Buku</title>
</head>
<body>

<h2>Upload Buku PDF</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form action="/upload" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Judul Buku</label><br>
    <input type="text" name="title" required><br><br>

    <label>Kategori</label><br>
    <select name="category_id" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select><br><br>

    <label>File PDF</label><br>
    <input type="file" name="file" accept="application/pdf" required><br><br>

    <button type="submit">Upload</button>
</form>

</body>
</html>
