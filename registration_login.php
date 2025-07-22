<?php
// registration_login.php
session_start();
include("db.php"); // fail sambungan DB (buat fail ini nanti)

function redirectToHome() {
  header("Location: THEHOMEPAGE.html");
  exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $no_giliran = $_POST['no_giliran'] ?? '';
  $password = $_POST['password'] ?? '';
  $confirm = $_POST['confirm_password'] ?? '';
  $action = $_POST['action'] ?? ''; // 'register' atau 'login'

  if ($action === "register") {
    // Register baru
    if ($password !== $confirm) {
      echo "Kata laluan tidak sepadan.";
      exit();
    }

    // Semak kalau dah wujud
    $check = mysqli_query($conn, "SELECT * FROM users WHERE no_giliran='$no_giliran'");
    if (mysqli_num_rows($check) > 0) {
      echo "Akaun sudah wujud.";
      exit();
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $random_id = strtoupper(bin2hex(random_bytes(3))); // ID rawak untuk semakan pentadbir
    $insert = mysqli_query($conn, "INSERT INTO users (no_giliran, password, user_id) VALUES ('$no_giliran', '$hashed', '$random_id')");

    if ($insert) {
      $_SESSION['user_id'] = $random_id;
      redirectToHome();
    } else {
      echo "Ralat semasa mencipta akaun.";
    }

  } elseif ($action === "login") {
    $check = mysqli_query($conn, "SELECT * FROM users WHERE no_giliran='$no_giliran'");
    if (mysqli_num_rows($check) === 1) {
      $user = mysqli_fetch_assoc($check);
      if (password_verify($password, $user['password']) && $password === $confirm) {
        $_SESSION['user_id'] = $user['user_id'];
        redirectToHome();
      } else {
        echo "Kata laluan tidak sah.";
      }
    } else {
      echo "Akaun tidak wujud.";
    }
  }
}
?>
