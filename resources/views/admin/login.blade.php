<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
</head>
<body>

<h1>Login Admin</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

    <form action="{{ route('admin.login.process') }}" method="POST">
    @csrf

    <div>
        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            required
        >
    </div>

    <br>

    <div>
        <label for="password">Password</label>
        <input
            type="password"
            id="password"
            name="password"
            required
        >
    </div>

    <br>

    <button type="submit">Login</button>
</form>

</body>
</html>