@extends('layouts.admin')

@section('title', 'Login')

@section('content')
<div class="login-wrapper">
    <div class="login-card">
        <div class="login-header">
            <span class="login-icon">⚡</span>
            <h2>Admin Panel</h2>
            <p>Enter your password to continue</p>
        </div>
        <form action="{{ route('admin.login.post') }}" method="POST" class="login-form">
            @csrf
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" autofocus required>
                @error('password')
                    <span class="field-error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-full">Login →</button>
        </form>
        <div class="login-footer">
            <a href="{{ route('home') }}" class="back-link">← Back to Portfolio</a>
        </div>
    </div>
</div>
@endsection
