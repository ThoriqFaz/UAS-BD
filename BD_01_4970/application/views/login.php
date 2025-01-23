<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
    <script src="<?= base_url('assets/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <link rel="icon" href="<?= base_url('assets/lb_icon.png'); ?>" type="image/png">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-container {
            display: flex;
            background-color: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            overflow: hidden;
            width: 800px;
        }
        .image-section {
            flex: 1;
            background-image: url('<?= base_url('assets/kato.jpg'); ?>');
            background-size: cover;
            background-position: center;
        }
        .form-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-section h2 {
            margin-bottom: 30px;
            text-align: center;
            font-size: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px; 
        }
        .form-section h2 img {
            width: 30px;
            height: 30px;
        }
        .form-section input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-section button {
            width: 40%;
            padding: 10px;
            background-color: #d04b4b;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .form-section button:hover {
            background-color: #b33d3d;
        }
        .form-section a {
            color: #333;
            text-decoration: none;
            text-align: left;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="image-section"></div>
        <div class="form-section">
            <h2>
                <img src="<?= base_url('assets/lb_logo.png'); ?>" alt="Icon">
                Sign into your account
            </h2>
            <form action="<?=base_url() . 'auth/action_login'?>" method="POST">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
            </form>
            <a href="#">Forgot password?</a>
            <a href="formregister.php">Don't have an account? <b>Register here</b></a>
        </div>
    </div>

</body>
</html>
