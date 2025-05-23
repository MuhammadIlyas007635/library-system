<h2>Search Results</h2>

@if ($users->count() > 0)
    <ul>
        @foreach ($users as $user)
            <li>
                <p>{{ $user->name }}</p>
            </li>
        @endforeach
    </ul>
@else
    <p>No users found matching your search.</p>
@endif