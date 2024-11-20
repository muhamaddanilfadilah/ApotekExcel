@extends('layout.template')

@section('content')
    <form action="{{ route('login.auth') }}" class="card p-5 shadow-lg" method="POST" style="max-width: 400px; margin: auto; border-radius: 8px; background-color: #fff;">
        @csrf

        <!-- Notification Alerts -->
        @if (Session::get('failed'))
            <div class="alert alert-danger custom-alert">{{ Session::get('failed') }}</div>
        @endif
        @if (Session::get('logout'))
            <div class="alert alert-primary custom-alert">{{ Session::get('logout') }}</div>
        @endif
        @if (Session::get('canAccess'))
            <div class="alert alert-danger custom-alert">{{ Session::get('canAccess') }}</div>
        @endif

        <!-- Email Field -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control custom-input">
            @error('email')
                <small class="text-danger error-text">{{ $message }}</small>
            @enderror
        </div>

        <!-- Password Field -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" name="password" id="password" class="form-control custom-input">
                <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                    <i class="bi bi-eye" id="eyeIcon" style="font-size: 18px;"></i>
                </span>
            </div>
            @error('password')
                <small class="text-danger error-text">{{ $message }}</small>
            @enderror
        </div>

        <!-- Button -->
        <button type="submit" class="btn btn-success custom-btn">LOGIN</button>
    </form>

    <!-- External CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- Password Toggle Script -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('bi-eye');
                eyeIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('bi-eye-slash');
                eyeIcon.classList.add('bi-eye');
            }
        });
    </script>
@endsection

<style>
    /* Custom styling */
    .card {
        background-color: #ffffff;
        border-radius: 10px;
    }

    .custom-input {
        padding: 12px;
        font-size: 15px;
        border-radius: 8px;
        border: 1px solid #ddd;
        transition: border-color 0.3s ease;
    }

    .custom-input:focus {
        border-color: #28a745;
        box-shadow: 0 0 5px rgba(40, 167, 69, 0.2);
    }

    .custom-btn {
        width: 100%;
        padding: 12px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .custom-btn:hover {
        background-color: #218838;
        transform: translateY(-2px);
    }

    .alert {
        font-size: 14px;
        font-weight: 500;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
    }

    .custom-alert {
        font-size: 14px;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .error-text {
        font-size: 12px;
        font-style: italic;
    }
</style>
