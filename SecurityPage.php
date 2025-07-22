<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ms">
<head>
  <meta charset="UTF-8">
  <title>KVKaunsel | Log Masuk / Daftar</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #74ebd5, #9face6);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-box {
      background: white;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      width: 400px;
    }

    .form-box h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
    }

    .btn {
      width: 48%;
      padding: 12px;
      margin-top: 15px;
      border: none;
      background: #4e54c8;
      color: white;
      font-weight: bold;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .btn:hover {
      background: #3b3f99;
    }

    .btn-container {
      display: flex;
      justify-content: space-between;
    }
  </style>
</head>
<body>
  <div class="form-box">
    <h2>Selamat Datang ke KVKaunsel</h2>
    <form action="registration_login.php" method="POST">
      <label>Masukkan Angka Giliran:</label>
      <input type="text" name="no_giliran" required>

      <label>Kata Laluan:</label>
      <input type="password" name="password" required>

      <label>Sahkan Kata Laluan:</label>
      <input type="password" name="confirm_password" required>

      <div class="btn-container">
        <button class="btn" type="submit" name="action" value="register">Daftar Akaun</button>
        <button class="btn" type="submit" name="action" value="login">Log Masuk</button>
      </div>
    </form>
  </div>
</body>
</html>
