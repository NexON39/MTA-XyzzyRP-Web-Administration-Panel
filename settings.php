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
</head>
<body class="<?php echo $setTheme[0];?>">
    <?php
        $leftpanel->showLeftMobilePanel();
        $leftpanel->showLeftPanel();
    ?>

    <!-- main -->
    <div class="main">
        <div class="container">
            <div class="text-header">
                <h1>Ustawienia</h1>
            </div>
            <!-- input -->
            <div class="inputs settings">
                    <form action="src/chgnickname.php" method="post" id="form">
                        <div class="inputs_type">
                            <div><input type="text" placeholder="Nowy nick" name="chg_user_nick" required></div>
                        </div>
                        <div><input type="submit" value="Zmień nick" name="chg_user_btn"></div>
                    </form>        
                    <form action="src/chgpassword.php" method="post">
                        <div class="inputs_type">
                            <div><input type="text" placeholder="Akutalne hasło" name="chg_user_oldpass" required></div>
                            <div><input type="text" placeholder="Nowe hasło" name="chg_user_newpass" required></div>
                        </div>
                        <div><input type="submit" value="Zmień hasło" name="chg_user_pass_btn"></div>
                    </form>
            </div>
            <div class="inputs settings darkmode">
                <h3>Darkmode</h3>
                <label>
                    <input type="checkbox" class="checkbox-btn" <?php echo $setTheme[1];?>>
                    <span class="check"></span>
                </label>
            </div>
        </div>
    </div>

    <?php
        if(isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    ?>

    <script src="js/alerts.js"></script>
    <script src="js/app.js"></script>
    <script src="js/darkmode.js"></script>

</body>
</html>