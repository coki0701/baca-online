<h2>⭐ Buku Favorit</h2>

@forelse($bookmarks as $bookmark)

<div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">

    <h3>{{ $bookmark->book->title }}</h3>
    <p>{{ $bookmark->book->author }}</p>

    <a href="{{ route('books.read', $bookmark->book->id) }}" target="_blank">
        📖 Baca
    </a>

    <form action="{{ route('bookmark.remove',$bookmark->book->id) }}" method="POST">
        @csrf
        <button type="submit">❌ Hapus</button>
    </form>

</div>

@empty

<p>Belum ada bookmark</p>

@endforelse