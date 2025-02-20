@extends('app')

@section('content')
<div class="container">
    <h2>New User</h2>
    <form method="POST" action="/register">
        @csrf
        <input type="text" name="username" placeholder="Username" required>
        <input type="text" name="phone" placeholder="Phone Number" required>
        <button type="submit" class="btn btn-blue">Register</button>
    </form>
</div>
@endsection