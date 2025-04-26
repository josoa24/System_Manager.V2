<?php
include "../../inc/function.php";
$userName =  $_SESSION['userName'];
$sessionsName = $_SESSION['sessionsName'];
$option =  intval($_SESSION['idOption']);
$year = $_SESSION['current_Year'];
$id_School =  intval($_SESSION['id_School']);
$each_Students = getAllStudentsYear($id_School, $option, $year);
$levelsName = $_SESSION['levels_Name'];
$idSession = $_SESSION['idSession'];
$percent = toArray($idSession, $option, $year);
$levelsNumber = getLevelsNumber($option);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../assets/css/style-each-sessions.css" />
  <link rel="stylesheet" href="../../assets/css/responsive-each-session.css" />
  <link rel="stylesheet" href="../../assets/css/menu.css" />
  <link rel="icon" type="image/png" href="../../assets/images/logo-AEC.png">
  <script src="../../assets/javascript/all-students.js" defer></script>
  <script src="../../assets/javascript/sessions.js" defer></script>
  <script src="../../assets/javascript/search-sessions.js"></script>
  <script src="../../assets/javascript/closer.js" defer></script>
  <script src="../../assets/javascript/fee.js" defer></script>
  <title><?= $sessionsName; ?></title>
</head>

<body>
  <div class="content-left">
    <div class="close-container">
      <img id="closerIcon" src="../../assets/images//close_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
    </div>
    <div class="head txt2">YOUR ADMIN SPACE 2024</div>
    <hr />
    <div class="title grey" style="color: white">
      <img src="../../assets/images/apps_24dp_FFF_FILL0_wght400_GRAD0_opsz24.png" alt="">
      <?php echo $sessionsName; ?>
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
    <a href="sessions.php">
      <div class="each"><img src="../../assets/images/keyboard_backspace_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Go back</div>
    </a>
  </div>
  <?php for ($i = 1; $i <= $levelsNumber; $i++) { ?>
    <div class="register" style="display: none;" data-register="<?= $i; ?>">
      <div class="content-register">
        <div class="left">
          <h1>American English Camp</h1>
          <p>The new vibes of english</p>
          <div class="maquet">
            <img src="../../assets/images/location_on_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
            <p>Isoraka / Tsarasaotra</p>
          </div>
          <div class="maquet">
            <img src="../../assets/images/call_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
            <p>Phone number : +26100000000</p>
          </div>
          <div class="maquet">
            <img src="../../assets/images/mail_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
            <p>E - Mail : aec@gmail.com</p>
          </div>
          <div class="maquet">
            <img src="../../assets/images/link_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
            <p>Facebook : American English Camp</p>
          </div>
        </div>
        <div class="right">
          <header><img src="../../assets/images/close_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="" onclick="hide()" class="close"></header>
          <h1>Add Student</h1>
          <form action="../treatment/register-treatment.php" method="POST">
            <div class="grid">
              <label for="name">Name</label>
              <label for="firstName">First Name</label>
              <input type="text" id="name" name="name" required>
              <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="rad">
              <div class="radio">
                <label for="m">Sex M</label>
                <input type="radio" name="sex" id="m" value="M" required>
              </div>
              <div class="radio">
                <label for="f">F</label>
                <input type="radio" name="sex" id="f" value="F" required>
              </div>
            </div>
            <div class="normal">
              <label for="adress">Adress</label>
              <input type="text" id="adress" name="adress" required>
            </div>
            <div class="normal">
              <label for="phoneNumber">Phone number</label>
              <input type="text" id="phoneNumber" name="phoneNumber" required>
            </div>
            <input type="number" name="idLevel" value="<?= $i; ?>" style="display:none">
            <input type="submit" value="Register">
          </form>
        </div>
      </div>
    </div>
    <div class="reegister" style="display: none;" data-reegister="<?= $i; ?>">
      <div class=" list-students">
        <img src="../../assets/images/close_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="" onclick="hide()">
        <div class="header">All students</div>
        <div class="menu">
          <p>ID</p>
          <p>Name</p>
          <p>First Name</p>
          <p>Telephone</p>
          <p>Option</p>
        </div>
        <div class="list-scroll">
          <?php
          foreach ($each_Students as $show) { ?>
            <div class="p">
              <p> <?php echo $show['idStudent']; ?></p>
              <p> <?php echo $show['studentsName']; ?></p>
              <p> <?php echo $show['StudentsFirstName']; ?></p>
              <p> <?php echo $show['studentsTelephone']; ?></p>
              <form action="../pages/reegister-treatment.php" method="post">
                <input type="number" name="idLevelTwo" value="<?= $i; ?>" style="display:none">
                <input type="number" value="<?php echo $show['idStudent']; ?>" name="idStudent" style="display: none;">
                <div class="bx-container">
                  <label for="addbtn"><img src="../../assets/images/add_circle_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""></label>
                  <input type="submit" value="Add" id="addbtn">
                </div>
              </form>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  <?php } ?>
  <div class="content-right">
    <?php foreach (getAllLevels($option) as $level) { ?>
      <div class="fee-infos" style="display: none;" data-fee="<?= $level[0] ?>">
        <form action="">
          <label for="feeValue">Fee :
            <input id="feeValue" type="text" required> Ar
          </label>
          <div class="btn-cont">
            <button>Modify</button>
            <button type="button" class="canc">Cancel</button>
          </div>
        </form>
      </div>
    <?php } ?>
    <div class="show-container ">
      <img src="../../assets/images/shower.png" alt="">
    </div>

    <?php if (isset($_GET['added'])) { ?>
      <div class="toast" style="display: block;">
        <div class="toast-content">
          <i class="fas fa-solid fa-check check"></i>
          <div class="message">
            <span class="text text-1">Success</span>
            <span class="text text-2">Students added succesfully</span>
          </div>
          <i class="fa-solid fa-xmark close2" id="cc"></i>
          <div class="progress"></div>
        </div>
      </div>
    <?php } ?>
    <header>
      <div class="slogan">
        <img src="../../assets/images/294211246_5158543950920072_5734999502267911684_n.png" alt="" />
        <p>THE NEW VIBES OF ENGLISH</p>
      </div>

      <div class="admin-box">
        <p><?php echo $userName; ?></p>
        <img src="../../assets/images/AEC.jpg" alt="" />
      </div>
    </header>
    <div class="big-box">
      <div class="board-list">
        <?php foreach (getAllLevels($option) as $level) { ?>
          <div class="each-list <?php if ($level[2] == 1) {
                                  echo 'activeOnglet';
                                } ?>" data-anim="<?php echo $level[2]; ?>">
            <!-- <img class="img-btn" data-img="<?= $level[0] ?>" src="../../assets/images/info_24dp_297897_FILL0_wght400_GRAD0_opsz24.png" alt=""> -->
            <!-- <img class="img-btn" data-img="<?= $level[0] ?>" src="../../assets/images/info_24dp_F17A7A_FILL0_wght400_GRAD0_opsz24.png" alt=""> -->
            <!-- <img class="img-btn" data-img="<?= $level[0] ?>" src="../../assets/images/info_24dp_74BC8E_FILL0_wght400_GRAD0_opsz24.png" alt=""> -->
            <!-- <img class="img-btn" data-img="<?= $level[0] ?>" src="../../assets/images/info_24dp_FFC760_FILL0_wght400_GRAD0_opsz24.png" alt=""> -->
            <div class="chart">
              <img src="../../assets/images/equalizer_24dp_297897_FILL0_wght400_GRAD0_opsz24.png" alt="">
              <img src="../../assets/images/equalizer_24dp_F38F8F_FILL0_wght400_GRAD0_opsz24.png" alt="">
              <img src="../../assets/images/equalizer_24dp_80C298_FILL0_wght400_GRAD0_opsz24.png" alt="">
              <img src="../../assets/images/equalizer_24dp_FFC760_FILL0_wght400_GRAD0_opsz24.png" alt="">
            </div>
            <div class="top">
              <p><?php echo $level[1] ?></p>
              <h1><?php echo $level[2] ?></h1>
            </div>
            <div class="icon-cont">
              <svg>
                <circle cx="32" cy="32" r="32"> </circle>
                <circle cx="32" cy="32" r="32" style="stroke-dashoffset: <?php echo (228 - (228 * (86 / 15) * $percent[$level[2] - 1]) / 100); ?>;animation: shows 1.3s forwards;"> </circle>
              </svg>
              <h1><?php echo $percent[$level[2] - 1]; ?></h1>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="cont-all-students">
        <?php for ($i = 1; $i <= $levelsNumber; $i++) { ?>
          <div class="all-students <?php if ($i == 1) {
                                      echo 'listActive';
                                    } ?>  " data-anim="<?php echo $i; ?>">
            <div class="content">
              <div class="top-bar grey">
                <h1>All students </h1>
                <nav>
                  <ul>
                    <li class="on-hover">
                      <img src="../../assets/images/school_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.png" alt="">
                      members
                    </li>
                  </ul>
                </nav>
                <div class="add">
                  Add student
                  <img src="../../assets/images/add_circle_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
                  <div class="btn-cont" style="display: none;">
                    <button class="btn-register" data-btn="<?php echo $i; ?>">Register <img src="../../assets/images/chevron_right_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""></button>
                    <!-- <button class="btn-reegister" data-btn="<?php echo $i; ?>">Reregister <img src="../../assets/images/chevron_right_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""></button> -->
                  </div>
                </div>
              </div>
              <div class="head">
                <h1>ID</h1>
                <h1>Name</h1>
                <h1>First Name</h1>
                <h1>Sex</h1>
                <h1>Adress</h1>
                <h1>Telephone</h1>
                <h1>Infos</h1>
              </div>
              <div class="list-box">
                <?php
                $table = getStudentsInSessionsInfos($idSession, $i, $option, $year);
                if (!empty($table)) {
                  foreach ($table as $show) { ?>
                    <div class="one-students">
                      <p> <?php echo $show['idStudent']; ?></p>
                      <p> <?php echo $show['studentsName']; ?></p>
                      <p> <?php echo $show['StudentsFirstName']; ?></p>
                      <p> <?php echo $show['studentsSex']; ?></p>
                      <p> <?php echo $show['studentsAdress']; ?></p>
                      <p> <?php echo $show['studentsTelephone']; ?></p>
                      <a href="../treatment/traitement-each-students.php?idStudent=<?= $show['idStudent']; ?>">
                        <p>More infos <img src="../../assets/images/crayon.png" alt=""></p>
                      </a>
                    </div>
                <?php }
                } ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</body>

</html>