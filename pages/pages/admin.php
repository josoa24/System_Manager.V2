<?php
include "../../inc/function.php";
$year = date("Y");
$userName =  $_SESSION['userName'];
$id_School =  $_SESSION['id_School'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../assets/css/style-admin.css" />
  <link rel="stylesheet" href="../../assets/css/responsive-admin.css" />
  <link rel="stylesheet" href="../../assets/css/menu.css" />
  <script src="../../assets/javascript/function-admin.js" defer></script>
  <script src="../../assets/javascript/closer.js" defer></script>
  <link rel="icon" type="image/png" href="../../assets/images/logo-AEC.png">

  <title>Admin board</title>
</head>

<body>
  <div class="content-left">
    <div class="close-container">
      <img id="closerIcon" src="../../assets/images//close_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
    </div>
    <div class="img">
      <img src="../../assets/images/294211246_5158543950920072_5734999502267911684_n3.png" alt="" />
    </div>
    <div class="head txt2">WELCOME TO YOUR OFFICE</div>
    <hr />
    <div class="title blue">
      <img src="../../assets/images/apps_24dp_FFF_FILL0_wght400_GRAD0_opsz24.png" alt="">
      Board manager
    </div>

    <div class="each" id="lala">
      <img src="../../assets/images/admin_panel_settings_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">
      Manage admin
    </div>
    <!-- <a href="teachers.php">
      <div class="each">
        <img src="../../assets/images/groups_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Teachers
      </div>
    </a>
    <a href="presence.php">
      <div class="each"><img src="../../assets/images/app_registration_24dp_444242_FILL0_wght400_GRAD0_opsz24(1).png" alt="">Presence</div>
    </a>
    <a href="list-presence.php">
      <div class="each"><img src="../../assets/images/receipt_long_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Attendance list</div>
    </a>
    <a href="saving.php">
      <div class="each">
        <img src="../../assets/images/account_balance_wallet_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Savings
      </div>
    </a> -->
    <a href="../treatment/log-ou-treatment.php">
      <div class="each">
        <img src="../../assets/images/logout_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Log out
      </div>
    </a>
    <?php if (isset($_GET['succes'])) { ?>
      <div class="succes">
        <i class='bx bx-check-circle'></i>
        <p>Admin added successfully !</p>
      </div>
    <?php } ?>
    <?php if (isset($_GET['error'])) { ?>
      <div class="error">
        <i class='bx bx-x'></i>
        <p>Error Please retry again !</p>
      </div>
    <?php } ?>
  </div>
  <div class="content-right">
    <div class="show-container ">
      <img src="../../assets/images/shower.png" alt="">
    </div>
    <div id="admin-div" style="display: none">
      <div class="box-verify">
        <header>
          <img src="../../assets/images/admin-logo.png" alt="">
          <h1><?php echo $userName; ?></h1>
        </header>
        <form action="../treatment/traitement-ajout.php" method="post">
          <label for="admin-name">
            <p>Name</p>
            <img src="../../assets/images/person_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="">
            <input type="text" name="admin-name" id="admin-name" required>
          </label>
          <label for="admin-add">
            <p>Password</p>
            <img src="https://img.icons8.com/material-outlined/24/000000/visible--v1.png" class="password-icon" id="passwordIcon" onclick="togglePasswordVisibility1() ">
            <input type="password" name="admin-psw" id="admin-add" required>
          </label>
          <label for="admin-confirm">
            <p>Confirm password</p>
            <img src="../../assets/images/check_circle_24dp_000000_FILL0_wght400_GRAD0_opsz24.png" alt="">
            <input type="password" name="admin-new-psw" id="admin-confirm" required>
          </label>
          <label for="admin-pass">
            <img src="https://img.icons8.com/material-outlined/24/000000/visible--v1.png" class="password-icon" id="passwordIcon2" onclick="togglePasswordVisibility2()">
            <p>Your Password</p>
            <input type="password" name="psw" id="admin-pass" required>
          </label>
          <footer>
            <input type="submit" value="Valid">
            <button class="cancel-btn">Cancel</button>
          </footer>
        </form>
      </div>
    </div>
    <div class="top">
      <div class="english-contain">
        <div class="text-layer">
          <h1>ENGLISH LEARNERS</h1>
          <i>"Learning another language is not only learning different words for the same things, but learning another way to think about things."</i>
          <a href="../treatment/traitement-admin.php?name=ENGLISH&year=<?= date("Y"); ?>"><button>View more</button></a>
        </div>
      </div>
      <div class="list-year">
        <div class="bar">
          <h1>ALL YEARS</h1>
          <form action="" method="get">
            <label for="sub">
              <input type="number" placeholder="Search..." />
              <input type="submit" id="sub" style="display: none" />
              <i class="bx bx-search"></i></label>
          </form>
        </div>
        <hr />
        <div class="roll">
          <?php $table_Year1 = getAllYears(1, $year, $id_School);
          if (!empty($table_Year1)) { ?>
            <?php foreach ($table_Year1 as $show) { ?>
              <a href="../treatment/traitement-admin.php?name=ENGLISH&year=<?= $show['datas']; ?>">
                <p><?= $show['datas']; ?></p>
              </a>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="bottom-chinese">
      <div class="list-year">
        <div class="bar">
          <h1>ALL YEARS</h1>
          <form action="" method="get">
            <label for="sub">
              <input type="number" placeholder="Search..." />
              <input type="submit" id="sub" style="display: none" />
              <i class="bx bx-search"></i></label>
          </form>
        </div>
        <hr />
        <div class="roll">
          <?php $table_Year1 = getAllYears(2, $year, $id_School);
          if (!empty($table_Year1)) { ?>
            <?php foreach ($table_Year1 as $show) { ?>
              <a href="../treatment/traitement-admin.php?name=ENGLISH&year=<?= $show['datas']; ?>">
                <p><?= $show['datas']; ?></p>
              </a>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
      <div class="img">
        <img src="../../assets/images/boy-holding.jpg" alt="" />
        <div class="text-layer">
          <h1>CHINESE LEARNERS</h1>
          <div class="books">
            <div class="book-box">
              <img src="../../assets/images/book1.png" alt="" />
            </div>
            <div class="book-box">
              <img src="../../assets/images/book.avif" alt="" />
            </div>
            <div class="book-box">
              <img src="../../assets/images/book3.avif" alt="" />
            </div>
            <div class="book-box">
              <img src="../../assets/images/book1.png" alt="" />
            </div>
          </div>
          <!-- <a href="../treatment/traitement-admin.php?name=CHINESE&year=<?= date("Y"); ?>"><button>View more</button></a> -->
        </div>
      </div>
    </div>
  </div>
</body>

</html>