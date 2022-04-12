<?php
    // XyzzyRP Administration Panel Project
    // Author: NexON39
    // Discord: NexON39#5665
    session_start();
    if(isset($_SESSION['logged']) && $_SESSION['logged']==true)
        header("Location: dashboard.php");
    require_once "autoloader/autoload.php";
    
    $darkmode = new darkmode;
    $setTheme = $darkmode->setTheme();
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
    <!-- main -->
    <div class="loginpanel">
        <div class="container">
            <!-- input -->
            <div class="inputs loginpanel">
                <div class="text-header-logo">
                    <img src="img/logo.png" alt="">
                </div>
                <form action="src/login.php" method="post">
                    <div><input type="text" placeholder="Nick" name="login"></div>
                    <div><input type="password" placeholder="Hasło" name="pass"></div>
                    <div><input type="submit" value="Zaloguj" name="login_btn"></div>
                </form>
            </div>

        </div>
    </div>

    <?php
        $alert->showAlert();
    ?>

    <script src="js/aos.js"></script>
    <script src="js/alerts.js"></script>
    <!-- <script src="js/app.js"></script> -->

</body>
</html>