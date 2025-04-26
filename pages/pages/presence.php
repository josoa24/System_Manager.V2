<?php
include "../../inc/function.php";
$userName =  $_SESSION['userName'];
$id_School =  intval($_SESSION['id_School']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/style-all-students.css" />
    <link rel="stylesheet" href="../../assets/css/responsive-all-student.css" />
    <link rel="stylesheet" href="../../assets/css/responsive-sessions.css" />
    <link rel="stylesheet" href="../../assets/css/responsive-presence.css" />
    <link rel="stylesheet" href="../../assets/css/menu.css" />
    <link rel="icon" type="image/png" href="../../assets/images/logo-AEC.png">
    <script src="../../assets/javascript/all-students.js" defer></script>
    <script src="../../assets/javascript/canc.js" defer></script>
    <script src="../../assets/javascript/presence.js" defer></script>
    <script src="../../assets/javascript/closer.js" defer></script>
    <title>Presence</title>
</head>

<body>
    <div class="content-left">
        <div class="close-container">
            <img id="closerIcon" src="../../assets/images//close_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
        </div>
        <div class="head txt2">YOUR ADMIN SPACE <?= date("Y"); ?></div>
        <hr />
        <div class="title blue" style="color: white">
            <img src="../../assets/images/apps_24dp_FFF_FILL0_wght400_GRAD0_opsz24.png" alt="">
            ENGLISH & CHINESE
        </div>
        <a href="sessions.php">
            <div class="each" id="uni"><img src="../../assets/images/stacks_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Sessions</div>
        </a>
        <a href="teachers.php">
            <div class="each">
                <img src="../../assets/images/groups_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Teachers
            </div>
        </a>
        <a href="presence.php">
            <div class="each" style="background-color: rgba(207, 203, 203, 0.29);"><img src="../../assets/images/app_registration_24dp_444242_FILL0_wght400_GRAD0_opsz24(1).png" alt="">Presence</div>
        </a>
        <a href="list-presence.php">
            <div class="each"><img src="../../assets/images/receipt_long_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Attendance list</div>
        </a>
        <a href="saving.php">
            <div class="each">
                <img src="../../assets/images/account_balance_wallet_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Savings
            </div>
        </a>
        <a href="all-students.php">
            <div class="each"><img src="../../assets/images/keyboard_backspace_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Go back</div>
        </a>
    </div>
    <div class="content-right">
        <?php foreach (getTeachers($id_School) as $teacher) { ?>
            <div class="confirm-mark" style="display: none;" data-mark="<?= $teacher[6] ?>">
                <form action="">
                    <img class="canc" src="../../assets/images/close_24dp_444242_FILL0_wght400_GRAD0_opsz24(1).png" alt="">
                    <img src="../../assets/images/<?= $teacher[9] ?>" alt="">
                    <p>We've sent your code to your email</p>
                    <p><?= $teacher[8] ?></p>
                    <input type="number" placeholder="Your validation code">
                    <a href=""><button>Valid</button></a>
                </form>
            </div>
        <?php } ?>

        <div class="show-container ">
            <img src="../../assets/images/shower.png" alt="">
        </div>
        <header>
            <div class="slogan">
                <img src="../../assets/images/294211246_5158543950920072_5734999502267911684_n.png" alt="" />
                <p>THE NEW VIBES OF ENGLISH</p>
            </div>
            <div class="date" id="dateHeure">
                <p><i class="bx bx-calendar"></i> <span id="dateHeureText"></span></i>
            </div>
            <div class="admin-box">
                <p><?php echo $userName; ?></p>
                <img src="../../assets/images/AEC.jpg" alt="" />
            </div>
        </header>
        <div class="teacher-container">
            <?php foreach (getTeachers($id_School) as $teacher) { ?>
                <div class="teacher-box">
                    <div class="img-cont">
                        <img src="../../assets/images/<?= $teacher[9] ?>" alt="">
                    </div>
                    <h1>Teacher <?= $teacher[7] ?></h1>
                    <h4><?= $teacher[1] ?></h4>
                    <h5><?= $teacher[11] ?></h5>
                    <div class="days">
                        <?php for ($t = 0; $t < 7; $t++) { ?>
                            <div class="dayS   <?php if ($t == 1) {
                                                    echo "present";
                                                } ?>">
                                L
                            </div>
                        <?php } ?>
                    </div>
                    <button type=" button" class="btn-marker" data-btn="<?= $teacher[6] ?>">Leave a mark</button>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>