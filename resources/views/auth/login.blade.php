<style>
    .login-form-container {
        background-color: #3b82f6; /* Blue background */
        border-radius: 12px; /* More rounded corners */
        padding: 30px; /* Increased spacing inside the box */
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1); /* Deeper shadow for depth */
        color: white; /* Text color */
        max-width: 400px; /* Max width for better centering */
        margin: auto; /* Center the form on the page */
    }

    .login-form-container h2 {
        text-align: center; /* Center the heading */
        margin-bottom: 20px; /* Space below the heading */
        font-size: 1.5rem; /* Larger font size for heading */
        font-weight: 600; /* Semi-bold heading */
    }

    .login-form-container input {
        background-color: #1e3a8a; /* Darker blue for input */
        border: 1px solid #3b82f6; /* Match border with background */
        color: white; /* Input text color */
        border-radius: 8px; /* Rounded input edges */
        padding: 10px; /* Spacing inside inputs */
        transition: border-color 0.3s, background-color 0.3s; /* Smooth transition */
        width: 100%; /* Full width */
    }

    .login-form-container input:focus {
        border-color: #60a5fa; /* Light blue on focus */
        background-color: #1e40af; /* Slightly lighter blue on focus */
        outline: none; /* Remove default outline */
    }

    .login-form-container input::placeholder {
        color: #d1d5db; /* Light placeholder color */
    }

    .login-form-container label {
        color: #e5e7eb; /* Light label color */
        font-weight: 500; /* Semi-bold label */
    }

    .login-form-container .remember-me {
        color: #e5e7eb; /* Light text color */
    }

    .login-form-container .remember-me input {
        margin-right: 8px; /* Space between checkbox and label */
    }

    .login-form-container .forgot-password {
        color: #d1d5db; /* Light text color */
        text-align: right; /* Right-align the forgot password link */
    }

    .login-form-container .forgot-password a {
        color: #fff; /* Light blue color */
        transition: color 0.3s; /* Smooth color transition */
    }

    .login-form-container .forgot-password a:hover {
        color: yellow; /* Darker blue on hover */
    }

    .login-form-container button {
        background-color: #60a5fa; /* Button color */
        border: none; /* Remove default border */
        border-radius: 8px; /* Rounded button edges */
        padding: 10px; /* Button padding */
        color: white; /* Button text color */
        font-weight: bold; /* Bold button text */
        transition: background-color 0.3s; /* Smooth background transition */
    }

    .login-form-container button:hover {
        background-color: #3b82f6; /* Darker button color on hover */
    }
</style>

<!-- Session Status -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<!-- Validation Errors -->
<x-auth-validation-errors class="mb-4" :errors="$errors" />

<div class="login-form-container">
    <h2>{{ __('Login') }}</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" class="block mt-1" type="email" name="email" :value="old('email')" required autofocus placeholder="Email" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />
            <x-input id="password" class="block mt-1" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
        </div>

      

       

            <x-button>
                {{ __('Log in') }}
            </x-button>
        </div>
    </form>
</div>
