<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - My App</title>

    <link rel="stylesheet" href="../css/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Selamat Datang</h2>
        <p>Silakan login untuk masuk ke akun Anda</p>
        
        <form method="POST" action="prosesLogin.php">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <div>
                <input type="submit" id="submit" name="login" value="Login" class="btn-login">
            </div>
        </form>
        
        <div class="register-link">
            <span>Belum memiliki akun?</span>
            <a href="formRegister.php">Register</a>
        </div>
        <a href="../index.php"><button class="back-home">Home</button></a>
    </div>
</body>
</html>