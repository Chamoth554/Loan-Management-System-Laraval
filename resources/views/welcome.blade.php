<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Loan Management System</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #3B82F6; /* Tailwind blue-600 */
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            position: relative;
        }
        
        .header-links {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .header-link {
            margin-left: 10px;
            padding: 10px 20px;
            background-color: #ffffff;
            color: #3B82F6; /* Tailwind blue-600 */
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s, transform 0.3s;
        }

        .header-link:hover {
            background-color: #f0f0f0;
            transform: translateY(-2px);
        }

        .container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 90%;
            max-width: 400px;
        }

        .title {
            font-size: 2.5rem;
            color: #4B5563; /* Tailwind gray-700 */
            margin-bottom: 20px;
        }

        @media (max-width: 600px) {
            .title {
                font-size: 2rem;
            }

            .container {
                padding: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="header-links">
        @if (Route::has('login'))
            <div class="flex">
                @auth
                    <a href="{{ url('/dashboard') }}" class="header-link">Go to Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="header-link">Log In</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="header-link">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>

    <div class="container">
        <h1 class="title">Loan Management System</h1>
        <p class="subtitle">Your trusted partner in managing loans with ease and efficiency.</p>
    </div>
</body>
</html>
