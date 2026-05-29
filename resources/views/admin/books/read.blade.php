<!DOCTYPE html>
<html>
<head>
    <title>Baca Buku</title>
</head>

<body>

<h2>{{ $book->title }}</h2>
<p>Penulis: {{ $book->author }}</p>

<iframe 
    src="{{ asset($book->file_path) }}" 
    width="100%" 
    height="600px">
</iframe>

<br><br>

<a href="{{ url()->previous() }}">Kembali</a>

</body>
</html>