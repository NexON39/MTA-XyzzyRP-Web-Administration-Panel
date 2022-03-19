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
                <h1>Operacje na użytkownikach</h1>
            </div>
            <!-- input -->
            <div class="inputs operations">
                <form action="" method="post">
                    <div class="inputs_type">
                        <div><input type="text" placeholder="UID" name="ban_uid"></div>
                        <div><input type="text" placeholder="Czas" name="ban_time"></div>
                        <div><input type="text" placeholder="(m/h/d)" name="ban_unit"></div>
                        <div><input type="text" placeholder="Powód" name="ban_reason"></div>   
                    </div>
                    <div><input type="submit" value="Ban"></div>
                </form>
                <form action="" method="post">
                    <div class="inputs_type">
                        <div><input type="text" placeholder="UID" name="kick_uid"></div>
                        <div><input type="text" placeholder="Powód" name="kick_reason"></div>
                    </div>
                    <div><input type="submit" value="Kick"></div>
                </form>
                <form action="" method="post">
                    <div class="inputs_type">
                        <div><input type="text" placeholder="UID" name="aj_uid"></div>
                        <div><input type="text" placeholder="Czas(m)" name="aj_time"></div>
                        <div><input type="text" placeholder="Powód" name="reason_reason"></div>
                    </div>
                    <div><input type="submit" value="Jail"></div>
                </form>
                <form action="" method="post">
                    <div class="inputs_type">
                        <div><input type="text" placeholder="UID" name="booc_uid"></div>
                        <div><input type="text" placeholder="Czas" name="ooc_time"></div>
                        <div><input type="text" placeholder="(m/h/d)" name="ooc_unit"></div>
                        <div><input type="text" placeholder="Powód" name="ooc_reason"></div>
                    </div>
                    <div><input type="submit" value="Blokada OOC"></div>
                </form>
                <form action="" method="post">
                    <div class="inputs_type">
                        <div><input type="text" placeholder="UID" name="gp_uid"></div>
                        <div><input type="text" placeholder="Powód" name="gp_reason"></div>
                        <div><input type="text" placeholder="Ilość" name="gp_count"></div>
                    </div>
                    <div><input type="submit" value="Dodawanie GP"></div>
                </form>
                <form action="" method="post">
                    <div class="inputs_type">
                        <div><input type="text" placeholder="UID" name="bpm_uid"></div>
                        <div><input type="text" placeholder="Czas" name="bpm_time"></div>
                        <div><input type="text" placeholder="(m/h/d)" name="bpm_unit"></div>
                        <div><input type="text" placeholder="Powód" name="bpm_reason"></div>
                    </div>
                    <div><input type="submit" value="Blokada PM"></div>
                </form>
            </div>
        </div>
    </div>

    <script src="js/aos.js"></script>
    <script src="js/app.js"></script>

</body>
</html>