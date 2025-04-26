<?php
include "../../inc/function.php";
$year = date("Y");
$userName =  $_SESSION['userName'];
$id_School =  intval($_SESSION['id_School']);
$res = getPaid($id_School);
$total = getTotal($id_School);
$last_Month = get_Last_Month($id_School);
$last_Week = get_Last_Week($id_School);
$today =  get_Today($id_School);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/style-saving.css" />
    <link rel="stylesheet" href="../../assets/css/responsive-saving.css" />
    <link rel="stylesheet" href="../../assets/css/menu.css" />
    <link rel="icon" type="image/png" href="../../assets/images/logo-AEC.png">
    <script src="../../assets/javascript/function-admin.js" defer></script>
    <script src="../../assets/javascript/closer.js" defer></script>
    <title>Saving</title>
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
        <a href="sessions.php">
            <div class="each" id="uni"><img src="../../assets/images/stacks_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Sessions</div>
        </a>
        <a href="teachers.php">
            <div class="each" >
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
            <div class="each" style="background-color: rgba(207, 203, 203, 0.29);">
                <img src="../../assets/images/account_balance_wallet_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Savings
            </div>
        </a>
        <a href="all-students.php">
            <div class="each"><img src="../../assets/images/keyboard_backspace_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Go back</div>
        </a>
    </div>
    <div class="content-right">
        <div class="show-container ">
            <img src="../../assets/images/shower.png" alt="">
        </div>
        <div class="top">
            All payment
        </div>
        <div class="menu-box">
            <p>Option</p>
            <p>ID</p>
            <p>Name</p>
            <p>First Name</p>
            <p>Admin</p>
            <p>Value</p>
            <p>Date <img src="../../assets/images/expand_all_24dp_FILL0_wght400_GRAD0_opsz24.png" alt=""></p>
        </div>
        <div class="listBox">
            <?php foreach ($res as $show) { ?>
                <div class="each-payment">
                    <p> <?= $show['optionsName'] ?></p>
                    <p> <?= $show['idStudent'] ?></p>
                    <p><?= $show['studentsName'] ?></p>
                    <p><?= $show['StudentsFirstName'] ?></p>
                    <p><?= $show['adminsName'] ?></p>

                    <p><?= $show['montant'] ?> Ar</p>
                    <p><?= (new DateTime($show['date']))->format("d M Y") ?></p>
                </div>
            <?php } ?>
        </div>
        <div class="bottom">
            <h1>TOTAL = <?= $total ?> Ar</h1>
            <p>Last month : <?= $last_Month ?> Ar</p>
            <p>Last week : <?= $last_Week ?> Ar</p>
            <p>Today : <?= $today ?> Ar</p>
        </div>
    </div>
</body>

</html>