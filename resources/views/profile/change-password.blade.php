<h2>Change Password</h2>

<form method="POST" action="{{ route('profile.password.update') }}">
    @csrf
    @method('POST')

    <input type="password" name="current_password" placeholder="Current Password" required><br>
    <input type="password" name="new_password" placeholder="New Password" required><br>
    <input type="password" name="new_password_confirmation" placeholder="Confirm New Password" required><br>

    <button type="submit">Change Password</button>
</form>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if($errors->any())
    <ul style="color: red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
