    <!-- resources/views/auth/register.blade.php -->
    @extends('layouts')

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
        <label for="name">{{ __('Name') }}</label>
        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="email">{{ __('E-Mail Address') }}</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" name="password" required>
        @error('password')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="password_confirmation">{{ __('Confirm Password') }}</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
        @error('password_confirmation')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit">{{ __('Register') }}</button>
    </div>
</form>
@endsection