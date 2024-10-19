<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dinas Kesehatan Kabupaten Pati</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
            background-color: #2469A5;
            /* Light background color */
            overflow-x: hidden;
            /* Prevent scrolling */
        }

        .container-fluid {
            height: 100%;
            width: 101%;
            display: flex;
            position: fixed;
            /* Fixed positioning */
        }

        /* Left panel styling */
        .left-panel {
            background-color: #2469A5;
            /* Blue color */
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
            /* Adjust logo size */
            height: auto;
            margin-bottom: 20px;
        }

        .left-panel h1 {
            color: #ff0000;
            /* Red text color */
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        .left-panel p {
            font-size: 18px;
            margin: 5px 0;
        }

        /* Right panel styling */
        .right-content {
            background-image: url('images/kuisioner.png');
            /* Background image */
            background-size: cover;
            background-position: center;
            background-color: #f9f6f6;
            /* Blue color */
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
            /* Allow the right panel to take available space */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            /* Add padding to the right panel */
        }

        /* Login box styling */
        .login-box {
            background-color: #fff;
            /* Light pinkish background */
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

        .login-box .system-info {
            color: #0056b3;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .login-box .input-group {
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            /* Center align items */
            position: relative;
        }

        .login-box .input-group .form-control {
            padding-left: 40px;
            /* Adjust padding to accommodate icon */
            height: 50px;
            /* Adjust height */
            font-size: 16px;
            border: none;
            border-bottom: 2px solid #ccc;
            /* Thin bottom border */
            border-radius: 0;
            /* No border radius */
            flex-grow: 1;
            /* Allow the input to take available space */
        }

        .login-box .input-group .form-control:focus {
            border-color: #0056b3;
            box-shadow: none;
        }

        .login-box .input-group .input-icon {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 22px;
            /* Larger icon size */
            color: #0056b3;
            /* Blue icon color */
        }

        .login-box .btn-primary {
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            background-color: #0056b3;
            border: none;
            border-radius: 10px;
        }

        /* Align Show Password and Login button next to each other */
        .login-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .toggle-switch {
            display: flex;
            align-items: center;
        }

        .toggle-switch label {
            margin-left: 10px;
            font-size: 14px;
            color: #333;
        }

        .toggle-switch input[type="checkbox"] {
            width: 40px;
            height: 20px;
            -webkit-appearance: none;
            background: #ccc;
            outline: none;
            border-radius: 50px;
            position: relative;
            cursor: pointer;
            transition: background 0.3s;
        }

        .toggle-switch input[type="checkbox"]:checked {
            background: #0056b3;
        }

        .toggle-switch input[type="checkbox"]::before {
            content: '';
            position: absolute;
            top: 2px;
            left: 2px;
            width: 16px;
            height: 16px;
            background: white;
            border-radius: 50%;
            transition: left 0.3s;
        }

        .toggle-switch input[type="checkbox"]:checked::before {
            left: 22px;
        }

        .form-check-label {
            font-size: 14px;
            margin-left: 5px;
            color: #333;
        }

        @media (max-width: 768px) {
            body {
                background-image: url('images/kuisioner.png');
                background-size: cover;
                background-position: center;
                background-color: #f9f6f6;
                overflow: hidden;
            }
            .left-panel {
                display: none; /* Sembunyikan panel kiri */
            }

            .right-content {
                background: transparent;
                width: 100%; /* Panel kanan mengambil seluruh lebar */
                justify-content: center; /* Tengah-tengahkan konten secara vertikal */
                align-items: center; /* Tengah-tengahkan konten secara horizontal */
                overflow: hidden;
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
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Left panel -->
        <div class="left-panel">
            <img src="images/logodin.png" alt="Dinas Kesehatan Logo"> <!-- Add your logo path -->
        </div>

        <div class="right-content">
            <!-- Right panel -->
            <div class="right-panel">
                <div class="login-box">
                    <h1>Masuk untuk mengisi kuesioner</h1>
                    <p class="system-info">SISTEM INFORMASI RUMPUN BIDANG INFRASTRUKTUR DAN KEWILAYAHAN PATI</p>

                    <!-- Email input -->
                    <div class="input-group">
                        <img src="{{ asset('images/e.png') }}" alt="Email Icon"
                            style="width: 20px; height: 20px; margin-right: 10px;">
                        <input type="email" class="form-control" id="email" placeholder="Email" required>
                    </div>

                    <!-- Password input -->
                    <div class="input-group">
                        <img src="{{ asset('images/p.png') }}" alt="Password Icon"
                            style="width: 20px; height: 20px; margin-right: 10px;">
                        <input type="password" class="form-control" id="password" placeholder="Password" required>
                    </div>

                    <!-- Show Password toggle and Login button -->
                    <div class="login-actions">
                        <!-- Show Password toggle -->
                        <div class="toggle-switch">
                            <input type="checkbox" id="showPassword" onclick="togglePassword()">
                            <label for="showPassword">Show Password</label>
                        </div>

                        <!-- Login button -->
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
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