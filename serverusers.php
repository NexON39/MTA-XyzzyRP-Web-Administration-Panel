<?php
    session_start();
    if(!isset($_SESSION['logged']) && $_SESSION['logged']!=true) {
        header("Location: index.php");
        exit();
    }
    require_once "autoloader/autoload.php";
    require_once "includes/serverusers_class.php";
    $alert = new alerts;
    $darkmode = new darkmode;
    $setTheme = $darkmode->setTheme();
    $leftpanel = new leftpanel;
    $playerstats = new playerstats;
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
        $leftpanel->showLeftMobilePanel();
        $leftpanel->showLeftPanel();
    ?>
    
    <!-- main -->
    <div class="main">
        <div class="container">
            <div class="text-header">
                <h1>Użytkownicy serwera</h1>
            </div>
            <!-- input -->
            <div class="inputs">
                <form action="serverusers.php" method="post">
                    <div><input type="text" placeholder="UID" name="playerstat_uid"></div>
                    <div><input type="submit" value="Sprawdź" name="playerstat_btn"></div>
                </form>
            </div>
            <!-- playerstats -->
            <div class="inputs serverusers">
                <?php
                    $playerstats->getPlayerStats();
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