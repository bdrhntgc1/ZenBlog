<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Kayıt Ol</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .register-box {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .register-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .register-box input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .register-box button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #333;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .register-box a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }
        .error { color: red; text-align: center; }
        .success { color: green; text-align: center; }
    </style>
</head>
<body>
    <div class="register-box">
        <h2>Kayıt Ol</h2>
        <form action="register_process.php" method="POST">
            <input type="text" name="username" placeholder="Kullanıcı Adı" required>
            <input type="password" name="password" placeholder="Şifre" required>
            <button type="submit">Kayıt Ol</button>
        </form>

        <?php if (isset($_GET['error'])): ?>
            <p class="error">Bu kullanıcı adı zaten kullanılıyor!</p>
        <?php elseif (isset($_GET['success'])): ?>
            <p class="success">Kayıt başarılı! <a href="login.php">Giriş yap</a></p>
        <?php endif; ?>

        <a href="login.php">Zaten hesabın var mı? Giriş Yap</a>
    </div>
</body>
</html>
