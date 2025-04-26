<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="assets/css/style-index.css" />
  <link rel="stylesheet" href="assets/css/responsive.css">
  <script src="assets/javascript/function-admin.js"></script>
  <link rel="icon" type="image/png" href="assets/images/logo-AEC.png">
  <title>Login Page</title>
</head>

<body>
  <div class="content">
    <div class="left-logo">
      <img src="assets/images/logo2.png" alt="" />
    </div>
    <div class="all-util">
      <h1>LOG YOUR INFO</h1>
      <form action="pages/treatment/traitement-index.php" method="post">
        <label for="name">
          <input id="name" type="text" name="name" placeholder="Identify your name please" required />
          <img class="identity" src="assets/images/id_card_24dp_151515_FILL0_wght400_GRAD0_opsz24.png" alt="">
        </label>
        <label for="id">
          <input id="id" type="password" name="psw" placeholder="Your password please" required />
          <img src="https://img.icons8.com/material-outlined/24/000000/visible--v1.png" class="password-icon" id="passwordIcon" onclick="togglePasswordVisibility()">
        </label>
        <select name="school" id="">
          <option value="1">MIAMI</option>
        </select>
        <?php if (isset($_GET['error'])) { ?>
          <p class="error">Please verify your user name or your password</p>
        <?php } ?>
        <input type="submit" value="Submit">
      </form>
    </div>
  </div>
</body>

</html>