<p>Hi {{ $user->first_name }},</p>

<p>Click the link below to reset your password:</p>

<a href="{{ url('/reset-password/' . $token) }}">Reset Password</a>
