<?php

require("fungsi.php");

session_start();
if (isset($_SESSION['username'])) {
  header("Location: dashboard.php");
  exit();
}
validasi_login();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="assets/css/login.css" />
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon" />
  <title>Login</title>
</head>

<body>
  <section>
    <div class="form-box">
      <button class="btn-close" onclick="window.open('index.php', '_parent')">
        <i class="fa-solid fa-xmark" style="color: white"></i>
      </button>
      <div class="form-value">
        <form action="" method="post">
          <h2>
            <img src="assets/img/logo.png" alt="Logo" width="40" />Login
          </h2>
          <div class="input-box">
            <i class="fa-solid fa-envelope"></i>
            <input type="text" required>
            <span></span>
            <label>Username</label> 
          </div>
          <div class="input-box">
            <i class="fa-solid fa-lock"></i>
            <input type="password" required>
            <span></span>
            <label>Password</label>

          </div>
          <button type="submit" name="login">Log in</button>
        </form>
      </div>
    </div>
  </section>

  <script src="assets/js/script.js"></script>
  <script>
    let goTo = (namaSitus, statsBlank = true) => {
      if (statsBlank == true) {
        window.open(namaSitus, "_blank");
      } else {
        window.open(namaSitus, "_parent");
      }
    };
  </script>
</body>

</html>