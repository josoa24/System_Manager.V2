<?php
include "../../inc/function.php";
$userName =  $_SESSION['userName'];
$optionsName = $_SESSION['options_Name'];
$options =  $_SESSION['idOption'];
$year = $_SESSION['current_Year'];
$levelsName = $_SESSION['levels_Name'];
$id_School =  intval($_SESSION['id_School']);
$allSessions = get_All_Sessions($options, $year, $id_School);
$each_Students = getAllStudentsYear($id_School, $options, $year);
$level1Students = getStudentsLevel($id_School, 1, $options, $year);
$level2Students = getStudentsLevel($id_School, 2, $options, $year);
$level3Students = getStudentsLevel($id_School, 3, $options, $year);
$level4Students = getStudentsLevel($id_School, 4, $options, $year);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../assets/css/style-all-students.css" />
    <link rel="stylesheet" href="../../assets/css/responsive-all-student.css" />
    <link rel="stylesheet" href="../../assets/css/responsive-sessions.css" />
    <link rel="stylesheet" href="../../assets/css/menu.css" />
    <link rel="icon" type="image/png" href="../../assets/images/logo-AEC.png">
    <script src="../../assets/javascript/all-students.js" defer></script>
    <script src="../../assets/javascript/add-session.js" defer></script>
    <script src="../../assets/javascript/closer.js" defer></script>
    <title>All sessions</title>
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
            <div class="each" id="uni" style="background-color: rgba(207, 203, 203, 0.29);"><img src="../../assets/images/stacks_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Sessions</div>
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
        <?php if (isset($_GET['added'])) { ?>
            <div class="toast" style="display: block;">
                <div class="toast-content">
                    <i class="fas fa-solid fa-check check"></i>
                    <div class="message">
                        <span class="text text-1">Success</span>
                        <span class="text text-2">Session added succesfully</span>
                    </div>
                    <i class="fa-solid fa-xmark close2" id="cc"></i>
                    <div class="progress"></div>
                </div>
            </div>
        <?php } ?>
        <div class="back" style="display: none;">
            <form class="form-adder" action="../treatment/traitement-sessions.php" method="post">
                <div class="input-form">
                    Select session :
                    <select name="sessions_Name" id="" required>
                        <?php foreach (getTypeCours() as $cours) { ?>
                            <option value="<?php echo $cours[1] ?>"><?php echo $cours[1] ?></option>
                        <?php } ?>

                    </select>
                </div>
                <div class="button">
                    <button type="submit" class="submit">Add</button>
                    <button type="button" class="canceler1">Cancel</button>
                </div>
            </form>
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
        <div class="sessions-container">
            <?php foreach ($allSessions as $print) { ?>
                <a href="../treatment/traitement-each-sessions.php?idSession=<?php echo $print['idSession']; ?>&sessionsName=<?php echo $print['sessionsName']; ?>">
                    <div class="session">
                        <img src="../../assets/images/arrow_forward_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.png" alt="">
                        <div class="left-session">
                            <img src="../../assets/images/workspaces_24dp_327BA0_FILL0_wght400_GRAD0_opsz24.png" alt="">
                        </div>
                        <div class="right-session">
                            <h3><?php echo $print['sessionsName']; ?></h3>
                            <h1>1000</h1>
                            <div class="progression">
                                <div class="inside" style="width: 92%;"></div>
                            </div>
                            <h4><?php echo (new DateTime($print['date']))->format("d M Y"); ?></h4>
                        </div>
                    </div>
                </a>
            <?php } ?>
            <div class="adder">
                <img src="../../assets/images/add_circle_24dp_FILL0_wght400_GRAD0_opsz24.png" alt="">
            </div>
        </div>
    </div>
</body>

</html>