<h2>Riwayat Bacaan</h2>

@forelse($histories as $history)

<div>
    <h3>{{ $history->book->title }}</h3>
    <p>{{ $history->book->author }}</p>


    <a href="{{ route('books.read',$history->book->id) }}">
        Baca Lagi
    </a>
</div>

<hr>

@empty

<p>Belum ada riwayat bacaan</p>

@endforelse