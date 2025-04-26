<?php
include "../../inc/function.php";
$userName =  $_SESSION['userName'];
$optionsName = $_SESSION['options_Name'];
$idStudent = intval($_SESSION['idStudent']);
$photosName = getPhotos($idStudent);
$year = $_SESSION['current_Year'];
$idOption =  $_SESSION['idOption'];
$payment = getPayment($idStudent);
$rollInfos = getAllPayment($idStudent);
$students  = getStudent($idStudent, $year, $idOption);
$id_School = intval($_SESSION['id_School']);
$students_Level = get_Students_Current_Level($id_School, $idOption, $idStudent);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../assets/css/style-each-students.css" />
  <link rel="stylesheet" href="../../assets/css/responsive-each-students.css" />
  <link rel="icon" type="image/png" href="../../assets/images/logo-AEC.png">
  <link rel="stylesheet" href="../../assets/css/menu.css" />
  <script src="../../assets/javascript/closer.js" defer></script>
  <script src="../../assets/javascript/all-students.js" defer></script>
  <script src="../../assets/javascript/each-students.js" defer></script>
  <title>About <?= $students['studentsName']; ?></title>
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
    <a href="all-students.php">
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
      <div class="admin-box">
        <p><?php echo $userName; ?></p>
        <img src="../../assets/images/AEC.jpg" alt="" />
      </div>
    </header>
    <div class="big-box">
      <div class="left">
        <form id="photoForm" action="../treatment/treatment-photos.php" enctype="multipart/form-data" method="post">
          <label for="toFile">
            <img src="../../assets/images/photo_camera_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="" id="picture" style="cursor: pointer;">
          </label>
          <input type="file" style="display: none;" name="photo" id="toFile">
        </form>
        <img src="../../assets/images/<?= $photosName; ?>" alt="" id="profil">
        <div class="bottom">
          <h1>All informations</h1>
          <hr>
          <div class="infos-container">
            <h1>Name</h1>
            <p><?= $students['studentsName']; ?></p>
          </div>
          <div class="infos-container">
            <h1>First Name</h1>
            <p><?= $students['StudentsFirstName']; ?></p>
          </div>
          <div class="infos-container">
            <h1>Adress</h1>
            <p><img src="../../assets/images/location_on_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""> <?= $students['studentsAdress']; ?></p>
          </div>
          <div class="infos-container">
            <h1>Phone number</h1>
            <p> <img src="../../assets/images/call_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""><?= $students['studentsTelephone']; ?></p>
          </div>
        </div>
      </div>
      <div class="right">
        <div class="container-all">
          <div class="image-left">
            <img src="../../assets/images/<?= $photosName; ?>" alt="" id="profil">
          </div>
          <div class="information-right">
            <div class="top">
              <h1><?= $students['studentsName']; ?> <img src="../../assets/images/verified_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""></h1> <span id="icon"><img src="../../assets/images/bookmark_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">Students</span>
            </div>
            <div class="supplementary-infos">
              <div class="infos"><?= $students['StudentsFirstName']; ?></div>
              <div class="infos"><?= $students['studentsAdress']; ?></div>
              <div class="infos"><?= $students['studentsTelephone']; ?></div>
            </div>
            <div class="infos">LEVEL <span class="level"><?= $students_Level ?></span></div>
            <div class="toil">
              <?php for ($i = 0; $i < $students_Level; $i++) { ?>
                <i class="bx bxs-star"></i>
              <?php } ?>
            </div>
            <div class="infos"> <img src="../../assets/images/person_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""><?= $students['studentsSex']; ?></div>
          </div>
        </div>
        <div class="intro">All Payment</div>
        <hr>
        <div class="menu">
          <h1>Payment</h1>
          <h1>Level</h1>
          <h1>Date</h1>
          <h1>Value</h1>
        </div>
        <div class="cont">
          <div class="payment-box">
            <?php foreach ($rollInfos as $show) {
              if ($show['montant'] != NULL) { ?>
                <div class="each-payment">
                  <div class="tranche">
                    <?php if ($show['typePayment'] == 1) {
                      echo  "1st payment";
                    } else {
                      echo "2nd payment";
                    } ?>
                  </div>
                  <div class="date">
                    <?= $show['idLevel'] ?>
                  </div>
                  <div class="date">
                    <?= (new DateTime($show['date']))->format("d M ") ?>
                  </div>
                  <div class="values">
                    <input type="number" value="<?= $show['montant'] ?>" disabled> Ar
                  </div>
                  <div class="verify ">
                    <img src="../../assets/images/check_circle_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
                    <input type="submit" value="Paid" <?php echo "disabled"; ?> class="<?php echo "paid"; ?>">
                  </div>
                </div>
              <?php } else if ($show['montant'] == NULL) { ?>
                <form action="payment-treatment.php" method="post">
                  <div class="each-payment notPaid">
                    <input type="hidden" name="idPayment" value="<?= $show['idPayment'] ?>">
                    <div class="tranche">
                      <?php if ($show['typePayment'] == 1) {
                        echo "1st payment";
                      } else {
                        echo "2nd payment";
                      } ?>
                    </div>
                    <div class="date">
                      <?= $show['idLevel'] ?>
                    </div>
                    <div class="date">
                      <?= "Not paid" ?>
                    </div>
                    <div class="values">
                      <input type="number" placeholder="<?php echo "Enter your montant"; ?>" name="values" required> Ar
                    </div>
                    <div class="verify">
                      <img src="../../assets/images/pending_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
                      <input type="submit" value="Pay" class="<?php echo "pay"; ?>">
                    </div>
                  </div>
                </form>
            <?php }
            } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>