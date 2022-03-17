<?php
    session_start();
    if(!isset($_SESSION['logged']) && $_SESSION['logged']!=true) {
        header("Location: index.php");
        exit();
    }
    require_once "autoloader/autoload.php";
    $darkmode = new darkmode;
    $setTheme = $darkmode->setTheme();
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
    <!-- left side menu mobile -->
    <div class="leftpanel-mobile flex">
        <div class="logo">
            <i class="fas fa-bars btn-leftpanel-mobile"></i>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-server"></i></a></li>
                <li><a href="serverusers.php"><i class="fas fa-search"></i></a></li>
                <li><a href="operations.php"><i class="fas fa-ban"></i></i></a></li>
                <li><a href="logs.php"><i class="fa fa-history"></i></a></li>
                <li><a href="panelusers.php"><i class="fas fa-users"></i></a></li>
                <li><a href="about.php"><i class="fas fa-info-circle"></i></a></li>
                <li><a href="settings.php"><i class="fa-solid fa-gear"></i></a></li>
            </ul>
        </nav>
        <div class="userlog">
            <!-- <div class="user">
                <img src="img/prof.png" alt="user avatar ">
            </div>   -->
            <div class="logout"><a href="src/logout.php"><i class="fas fa-sign-out-alt"></i></a></div>         
        </div>   
    </div>


    <!-- left side menu -->
    <div class="leftpanel flex" >
        <div class="logo">
            <h1>XyzzyRP AP</h1>
            <i class="fas fa-bars btn-leftpanel"></i>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="dashboard.php"><i class="fas fa-server"></i>Serwer</a></li>
                <li><a href="serverusers.php"><i class="fas fa-search"></i>Użytkownicy serwera</a></li>
                <li><a href="operations.php"><i class="fas fa-ban"></i>Operacje</a></li>
                <!-- <li><a href="#"><i class="fas fa-ban"></i></i>Banowanie</a></li>
                <li><a href="#"><i class="fas fa-gavel"></i>Kickowanie</a></li>
                <li><a href="#"><i class="fas fa-comment-slash"></i>Blokada czatu</a></li>
                <li><a href="#"><i class="fas fa-skull-crossbones"></i>Admin jail</a></li>
                <li><a href="#"><i class="fas fa-car"></i>Blokada jazdy</a></li>
                <li><a href="#"><i class="fas fa-car"></i>Nadaj gp</a></li> -->
                <li><a href="logs.php"><i class="fa fa-history"></i>Logi</a></li>
                <!-- <li><a href="#"><i class="far fa-address-card"></i>Logi panelu</a></li> -->
                <li><a href="panelusers.php"><i class="fas fa-users"></i></i>Użytkownicy panelu</a></li>
                <!-- <li><a href="#"><i class="fas fa-user-plus"></i>Dodaj użytkownika</a></li>
                <li><a href="#"><i class="fas fa-user-minus"></i>Usuń użytkownika</a></li> -->
                <li><a href="about.php"><i class="fas fa-info-circle"></i>Informacje ogólne</a></li>
                <li><a href="settings.php"><i class="fa-solid fa-gear"></i>Ustawienia</a></li>
            </ul>
        </nav>
        <div class="userlog">
            <div class="user">
                <!-- <img src="img/prof.png" alt="user avatar"> -->
                <p>
                    <?php
                        if(isset($_SESSION['user']))
                            echo $_SESSION['user'];
                    ?>
                </p>
            </div>  
            <div class="logout"><a href="src/logout.php"><i class="fas fa-sign-out-alt"></i></a></div>         
        </div>   
    </div>

    <!-- main -->
    <div class="main about">
        <div class="container">
            <div class="text-header">
                <h1>Informacje ogólne</h1>
            </div>
            <!-- about -->
            <div class="about">
                <div class="inputs">
                    <p>Autor aplikacji: <a href="https://kscode.pl" target="_blank">kscode.pl</a></p>
                    <div class="socials">
                        <a href="https://github.com/NexON39" target="_blank"><i class="fab fa-github"></i></a>
                        <a href="https://steamcommunity.com/id/NexON39/" target="_blank"><i class="fab fa-steam"></i></a>
                        <a href="https://discord.com/users/548963121453334538/" target="_blank"><i class="fab fa-discord"></i></a>
                    </div>
                    <p>Wersja aplikacji: 1.0.0</p>
                </div>
            </div>
        </div>
    </div>

    <script src="js/aos.js"></script>
    <script src="js/app.js"></script>

</body>
</html>