<h2>Books of {{ $user->name }}</h2>
<ul>
@foreach ($user->books as $book)
    <li>{{ $book->book_title }}</li>
@endforeach
</ul>