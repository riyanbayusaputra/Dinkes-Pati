<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dinas Kesehatan Kabupaten Pati</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Your existing styles here */
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
            background-color: #2469A5;
            overflow-x: hidden;
        }

        .container-fluid {
            height: 100%;
            width: 101%;
            display: flex;
            position: fixed;
        }

        .left-panel {
            background-color: #2469A5;
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: white;
        }

        .left-panel img {
            max-width: 60%;
            height: auto;
            margin-bottom: 20px;
        }

        .left-panel h1 {
            color: #ff0000;
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        .right-content {
            background-image: url('{{ asset('images/kuisioner.png') }}');
            background-size: cover;
            background-position: center;
            background-color: #f9f6f6;
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: white;
        }

        .right-panel {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-box {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-box h1 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #333;
        }

        .input-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-control {
            padding-left: 40px;
            height: 50px;
            font-size: 16px;
            border: none;
            border-bottom: 2px solid #ccc;
            border-radius: 0;
        }

        .form-control:focus {
            border-color: #0056b3;
            box-shadow: none;
        }

        .login-box .btn-primary {
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            background-color: #0056b3;
            border: none;
            border-radius: 10px;
        }

        .toggle-switch {
            display: flex;
            align-items: center;
        }

        .toggle-switch input[type="checkbox"] {
            width: 40px;
            height: 20px;
            background: #ccc;
            border-radius: 50px;
            cursor: pointer;
        }

        .toggle-switch input[type="checkbox"]:checked {
            background: #0056b3;
        }

        .toggle-switch input[type="checkbox"]::before {
            position: absolute;
            width: 16px;
            height: 16px;
            background: white;
            border-radius: 50%;
        }

        @media (max-width: 768px) {
            .left-panel {
                display: none;
            }

            .right-content {
                width: 100%;
                justify-content: center;
                align-items: center;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Left panel -->
        <div class="left-panel">
            <img src="{{ asset('images/logodin.png') }}" alt="Dinas Kesehatan Logo">
        </div>

        <div class="right-content">
            <div class="right-panel">
                <div class="login-box">
                    <h1>Masuk </h1>
                    <p class="system-info">SISTEM INFORMASI RUMPUN BIDANG INFRASTRUKTUR DAN KEWILAYAHAN PATI</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="input-group">
                            <img src="{{ asset('images/e.png') }}" alt="Email Icon" style="width: 20px; height: 20px; margin-right: 10px;">
                            <input type="email" class="form-control" name="email" :value="old('email')" placeholder="Email" required autofocus>
                        </div>

                        <!-- Password input -->
                        <div class="input-group">
                            <img src="{{ asset('images/p.png') }}" alt="Password Icon" style="width: 20px; height: 20px; margin-right: 10px;">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>

                        <!-- Show Password toggle and Login button -->
                        <div class="login-actions">
                            <div class="toggle-switch">
                                <input type="checkbox" id="showPassword" onclick="togglePassword()">
                                <label for="showPassword">Show Password</label>
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const passwordFieldType = passwordField.getAttribute('type');
            passwordField.setAttribute('type', passwordFieldType === 'password' ? 'text' : 'password');
        }
    </script>
</body>

</html>
