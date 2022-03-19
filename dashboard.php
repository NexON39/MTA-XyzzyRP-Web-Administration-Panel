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
                <h1>Statystyki serwera</h1>
            </div>
            <!-- stats -->
            <div class="stats">
                <div class="card">
                    <div class="card-left">
                        <p>Osoby online: </p>
                    </div>
                    <div class="card-right">
                        <p>80</p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-left">
                        <p>Sloty serwera: </p>
                    </div>
                    <div class="card-right">
                        <p>512</p>
                    </div>
                </div>  
                <div class="card">
                    <div class="card-left">
                        <p>Zarejestrowani: </p>
                    </div>
                    <div class="card-right">
                        <p>53000</p>
                    </div>
                </div>  
                <div class="card">
                    <div class="card-left">
                        <p>Użytkownicy panelu: </p>
                    </div>
                    <div class="card-right">
                        <p>5</p>
                    </div>
                </div>     
            </div>
            <!-- chart -->
                <div class="chart">
                    <canvas id="stats_chart" class="stats_chart"></canvas>
                </div>
            <!-- stats-server -->
            <div class="stats-server">
                <div class="stats">
                        <div class="card">
                            <div class="card-left">
                                <p>IP: </p>
                            </div>
                            <div class="card-right">
                                <p>23.32.51.223</p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-left">
                                <p>Port: </p>
                            </div>
                            <div class="card-right">
                                <p>25531</p>
                            </div>
                        </div>      
                </div>    
            </div>
                
        </div>
        <!-- footer -->
        <!-- <footer class="footer">
            <div class="footer-text">
                <p>kscode.pl</p>
                <p>Copyright &copy; 2021</p>
            </div>
            <nav>
                <ul>
                    <li><a href="#">Serwer</a></li>
                    <li><a href="#">Użytkownicy serwera</a></li>
                    <li><a href="#">Operacje</a></li>
                    <li><a href="#">Logi</a></li>
                    <li><a href="#">Użytkownicy panelu</a></li>
                    <li><a href="#">Informacje ogólne</a></li>
                </ul>
            </nav>
        </footer> -->
        <?php
        if(isset($_SESSION['alert'])) {
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    ?>
    </div>

    <script src="js/alerts.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/charts.min.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/app.js"></script>
    

</body>
</html>