<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        :root {
            --background-color1: #fafaff;
            --background-color2: #ffffff;
            --background-color3: #ededed;
            --background-color4: #cad7fda4;
            --primary-color: #4b49ac;
            --secondary-color: #0c007d;
            --Border-color: #3f0097;
            --one-use-color: #3f0097;
            --two-use-color: #5500cb;
        }

        body {
            background: linear-gradient(90deg, #3F2B96 0%, #A8C0FF 100%);
            max-width: 100%;
            overflow-x: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-container {
            background-color: var(--background-color2);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 3px 3px 10px rgba(0, 30, 87, 0.75);
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: var(--secondary-color);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            color: var(--secondary-color);
            font-weight: 600;
        }

        .form-control {
            height: 45px;
            border-radius: 5px;
            border: 2px solid var(--Border-color);
        }

        .login-btn {
            background-color: var(--two-use-color);
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            width: 100%;
            padding: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-btn:hover {
            background-color: var(--one-use-color);
        }

        .forgot-password {
            text-align: center;
            margin-top: 15px;
        }

        .forgot-password a {
            color: var(--secondary-color);
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="phptest.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password" required>
            </div>
            <button type="submit" class="login-btn">Login</button>
        </form>
        <div class="forgot-password">
            <a href="#">Forgot Password?</a>
        </div>
    </div>

</body>

</html>