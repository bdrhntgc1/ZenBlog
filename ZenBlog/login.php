<?php session_start(); 

?>
<!DOCTYPE html>
<html>
<head>
    <title>Giriş Yap</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .login-box h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .login-box input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        .login-box button {
            margin-top: 20px;
            width: 100%;
            padding: 12px;
            background: #333;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }
        .login-box a {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Giriş Yap</h2>
        <form action="login_process.php" method="POST">
            <input type="text" name="username" placeholder="Kullanıcı Adı" required>
            <input type="password" name="password" placeholder="Şifre" required>
            <button type="submit">Giriş</button>
        </form>

        <?php if (isset($_GET['error'])): ?>
            <p class="error">Kullanıcı adı veya şifre yanlış!</p>
        <?php endif; ?>

        <a href="register.php">Hesabın yok mu? Kayıt Ol</a>
    </div>
</body>
</html>
