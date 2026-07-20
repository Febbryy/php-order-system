<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - My App</title>
    <!-- Menghubungkan ke file CSS yang sama -->
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <div class="login-container register-width">
        <h2>Buat Akun Baru</h2>
        <p>Lengkapi data di bawah ini untuk mendaftar</p>
        
        <form action="prosesRegister.php" method="POST">
            <div class="input-group">
                <label for="nama">Nama Pelanggan</label>
                <input type="text" id="nama" name="nama" placeholder="Nama lengkap Anda" required>
            </div>
            
            <div class="input-group">
                <label for="no_telepon">No Telepon</label>
                <input type="number" id="no_telepon" name="no_telepon" placeholder="Contoh: 08123456789" required>
            </div>
            
            <div class="input-group">
                <label for="email">Email</label>
                <!-- Diubah ke type="email" agar browser otomatis memvalidasi format email -->
                <input type="email" id="email" name="email" placeholder="alamat@email.com" required>
            </div>
            
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Buat username" required>
            </div>
            
            <div class="input-group">
                <label for="alamat">Alamat</label>
                <textarea id="alamat" name="alamat" placeholder="Alamat lengkap rumah Anda..." rows="3" required></textarea>
            </div>
            
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Buat password aman" required>
            </div>
            
            <div>
                <!-- Mengubah value menjadi "Daftar" agar tidak membingungkan pengguna -->
                <input type="submit" id="submit" name="submit" value="Daftar" class="btn-login">
            </div>
        </form>

        <div class="register-link">
            <span>Sudah memiliki akun?</span>
            <a href="formLogin.php">Login</a>
        </div>
    </div>
</body>
</html>