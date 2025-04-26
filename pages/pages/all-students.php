<?php
include "../../inc/function.php";
$userName =  $_SESSION['userName'];
$optionsName = $_SESSION['options_Name'];
$option =  $_SESSION['idOption'];
$year = $_SESSION['current_Year'];
$levelsName = $_SESSION['levels_Name'];
$id_School =  intval($_SESSION['id_School']);
$allSessions = get_All_Sessions($option, $year, $id_School);
$each_Students = getAllStudentsYear($id_School, $option, $year);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../assets/css/style-all-students.css" />
  <link rel="stylesheet" href="../../assets/css/responsive-all-student.css" />
  <link rel="stylesheet" href="../../assets/css/menu.css" />
  <script src="../../assets/javascript/all-students.js" defer></script>
  <script src="../../assets/javascript/search.js" defer></script>
  <script src="../../assets/javascript/closer.js" defer></script>
  <link rel="icon" type="image/png" href="../../assets/images/logo-AEC.png">
  <title>All students</title>
</head>

<body>
  <div class="content-left">
    <div class="close-container">
      <img id="closerIcon" src="../../assets/images//close_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
    </div>
    <div class="head txt2">YOUR ADMIN SPACE 2024</div>
    <hr />
    <div class="title blue" style="color: white">
      <img src="../../assets/images/apps_24dp_FFF_FILL0_wght400_GRAD0_opsz24.png" alt="">
      <?php echo $optionsName; ?>
    </div>
    <a href="sessions.php">
      <div class="each" id="uni"><img src="../../assets/images/stacks_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Sessions</div>
    </a>
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
    <a href="admin.php">
      <div class="each"><img src="../../assets/images/keyboard_backspace_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Go back</div>
    </a>
  </div>
  <div class="content-right">
    <div class="show-container ">
      <img src="../../assets/images/shower.png" alt="">
    </div>
    <header>
      <div class="slogan">
        <img src="../../assets/images/294211246_5158543950920072_5734999502267911684_n.png" alt="" />
        <p>THE NEW VIBES OF ENGLISH</p>
      </div>
      <form method="get">
        <div class="image-search-container">
          <img src="../../assets/images/search_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
        </div>
        <input type="text" id="search-input" placeholder="Search students..." />
      </form>
      <div class="admin-box">
        <p><?php echo $userName; ?></p>
        <img src="../../assets/images/AEC.jpg" alt="" />
      </div>
    </header>
    <div class="big-box">
      <div class="board-list">
        <?php foreach (getAllLevels($option) as $level) { ?>
          <div class="each-list">
            <div class="icon-cont">
              <img src="../../assets/images/clock_loader_10_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.png" alt="">
              <img src="../../assets/images/clock_loader_20_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.png" alt="">
              <img src="../../assets/images/clock_loader_60_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.png" alt="">
              <img src="../../assets/images/clock_loader_90_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.png" alt="">
            </div>
            <div class="top">
              <p><?php echo $level[1] ?></p>
              <h1><?php echo $level[2] ?></h1>
            </div>
            <div class="bottom">
              <div class="styleSet">
                <?php for ($u = 0; $u < $level[2]; $u++) { ?>
                  <div class="one-style"></div>
                <?php } ?>
              </div>
              <p>Total students <?php echo getStudentsLevel($id_School, $level[2], $option, $year) ?></p>
            </div>
          </div>
        <?php }  ?>
      </div>

      <div class="all-students">

        <div class="contentIs activeContent" data-content="1">
          <div class="head">
            <h1>ID</h1>
            <h1>Name</h1>
            <h1>First Name</h1>
            <h1>Options</h1>
            <h1>Level</h1>
            <h1>Telephone</h1>
            <h1>Infos</h1>
          </div>
          <div class="list-box">
            <?php foreach ($each_Students as $show) { ?>
              <div class="one-students">
                <p> <?php echo $show['idStudent']; ?></p>
                <p> <?php echo $show['studentsName']; ?></p>
                <p> <?php echo $show['StudentsFirstName']; ?></p>
                <p> <?php echo $optionsName; ?></p>
                <p> <?php echo $show['idLevel']; ?></p>
                <p> <?php echo $show['studentsTelephone']; ?></p>
                <a href="../treatment/traitement-each-students.php?idStudent=<?= $show['idStudent']; ?>">
                  <p>More infos <img src="../../assets/images/crayon.png" alt=""></p>
                </a>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="top-bar blue">
          <h1>All students</h1>
          <div class="btnIs on-hover" data-show="1">
            <img src="../../assets/images/school_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.png" alt="">members
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>