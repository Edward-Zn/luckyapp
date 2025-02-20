<h2>Welcome, {{ $user->username }}</h2>
<p>Your unique link: <a href="{{ $user->unique_link }}">{{ $user->unique_link }}</a></p>
<p>Expires on: {{ $user->link_expires_at }}</p>

<form method="POST" action="{{ $user->unique_link }}/new">
    @csrf
    <button type="submit">Generate New Link</button>
</form>

<form method="POST" action="{{ $user->unique_link }}/deactivate">
    @csrf
    <button type="submit">Deactivate Link</button>
</form>

<button onclick="window.location.href='/lucky'">I'm Feeling Lucky!</button>

<p><button onclick="window.location.href='/'">New User</button><p>