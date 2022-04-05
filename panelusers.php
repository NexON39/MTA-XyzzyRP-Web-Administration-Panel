<?php
    session_start();
    if(!isset($_SESSION['logged']) && $_SESSION['logged']!=true) {
        header("Location: index.php");
        exit();
    }
    require_once "autoloader/autoload.php";
    $darkmode = new darkmode;
    $setTheme = $darkmode->setTheme();
    $leftpanel = new leftpanel;
    $alert = new alerts;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/animation.css">
    <link rel="stylesheet" href="css/utilities.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsives.css">
    <link rel="icon" type="image/x-icon" href="img/favicon.ico">
</head>
<body class="<?php echo $setTheme[0];?>">
    <?php
        $panelusers = new panelusers;
        $leftpanel->showLeftMobilePanel();
        $leftpanel->showLeftPanel();
    ?>

    <!-- main -->
    <div class="main">
        <div class="container">
            <div class="text-header">
                <h1>Użytkownicy panelu</h1>
            </div>
            <!-- input -->
            <div class="inputs panelusers">
                    <form action="src/adduser.php" method="post" id="form">
                        <div class="inputs_type">
                            <div><input type="text" placeholder="Nick" name="add_user_nick" required></div>
                            <div><input type="password" placeholder="Hasło" name="add_user_pass" required></div>
                        </div>
                        <div><input type="submit" value="Dodaj" name="add_user_btn"></div>
                    </form>        
                    <form action="src/deleteuser.php" method="post">
                        <div class="inputs_type">
                            <div><input type="text" placeholder="Nick" name="delete_user_nick" required></div>
                        </div>
                        <div><input type="submit" value="Usuń" name="delete_user_btn"></div>
                    </form>
            </div>
            <!-- playerstats -->
            <div class="inputs serverusers logs panelusers">
                <?php
                    $panelusers->showusers();
                ?>
            </div>
        </div>
    </div>

    <?php
        $alert->showAlert();
    ?>

    <script src="js/alerts.js"></script>
    <script src="js/app.js"></script>

</body>
</html>