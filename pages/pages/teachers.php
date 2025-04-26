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
    <link rel="stylesheet" href="../../assets/css/menu.css" />
    <link rel="stylesheet" href="../../assets/css/responsive-teacher.css" />
    <link rel="icon" type="image/png" href="../../assets/images/logo-AEC.png">

    <script src="../../assets/javascript/all-students.js" defer></script>
    <script src="../../assets/javascript/closer.js" defer></script>
    <script src="../../assets/javascript/teacher.js" defer></script>
    <title>Teachers</title>
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
            <div class="each" style="background-color: rgba(207, 203, 203, 0.29);">
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
        </a>
        <a href="all-students.php">
            <div class="each"><img src="../../assets/images/keyboard_backspace_24dp_444242_FILL0_wght400_GRAD0_opsz24.png" alt="">Go back</div>
        </a>
    </div>
    <div class="content-right">

        <?php foreach (getTeachers($id_School) as $teacher) { ?>
            <div class="confirm-dialog" style="display: none;" data-confirmation="<?= $teacher[6] ?>">
                <div class="dialog">
                    <h1>Warning !</h1>
                    <p>Are you sure to delete <?= $teacher[7]  ?> in Teacher's list?</p>
                    <footer>
                        <a href="../treatment/remove-teacher.php?idTeacher=<?= $teacher[6] ?>&idSchool=<?= $id_School ?>"><button>Confirm</button></a>
                        <button class="canc">Cancel</button>
                    </footer>
                </div>
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
                        <span class="text text-2">Teacher added succesfully</span>
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
            <form method="get">
                <label for="search-input">
                    <i class='bx bx-search-alt'></i>
                    <input type="text" id="search-input" placeholder="Search teacher..." />
                </label>
                <input id="bar" type="submit" style="display: none" />
            </form>
            <div class="admin-box">
                <p><?php echo $userName; ?></p>
                <img src="../../assets/images/AEC.jpg" alt="" />
            </div>
        </header>
        <div class="cont-all">
            <div class="teacher-container">
                <?php foreach (getTeachers($id_School) as $teacher) { ?>
                    <div class="teacher-box">
                        <div class="img-cont">
                            <img src="../../assets/images/<?= $teacher[9] ?>" alt="<?= $teacher[9] ?>">
                        </div>
                        <h1>Teacher <?= $teacher[7] ?></h1>
                        <h4><?= $teacher[1] ?></h4>
                        <h5><?= $teacher[11] ?></h5>
                        <div class=" btn">
                            <button type="button" class="remover" data-remover="<?= $teacher[6] ?>">Remove</button>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="add-teacher">
                <form action="../treatment/add-teacher-treatment.php" enctype="multipart/form-data" method="post">
                    <aside>
                        <label for="filer">
                            <img src="../../assets/images/photo.jpg" alt="">
                        </label>
                    </aside>
                    <div class="right-infs">
                        <p>Name</p>
                        <input type="text" name="name" placeholder="Steeve" required>
                        <p>Email</p>
                        <input type="email" name="email" placeholder="steeve@gmail.com" required>
                        <p>Option</p>
                        <select name="option" id="" required>
                            <?php foreach (getAllOptions()  as $option) { ?>
                                <option value="<?= $option[0] ?>"><?= $option[1] ?></option>
                            <?php } ?>
                        </select>
                        <input type="file" id="filer" name="file" required>
                        <button>Valid</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>