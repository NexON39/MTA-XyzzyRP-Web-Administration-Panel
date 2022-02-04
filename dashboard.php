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
<body>
    <!-- left side menu mobile -->
    <div class="leftpanel-mobile flex">
        <div class="logo">
            <i class="fas fa-bars btn-leftpanel-mobile"></i>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="dashboard.html"><i class="fas fa-server"></i></a></li>
                <li><a href="serverusers.html"><i class="fas fa-search"></i></a></li>
                <li><a href="operations.html"><i class="fas fa-ban"></i></i></a></li>
                <li><a href="logs.html"><i class="fa fa-history"></i></a></li>
                <li><a href="panelusers.html"><i class="fas fa-users"></i></a></li>
                <li><a href="about.html"><i class="fas fa-info-circle"></i></a></li>
            </ul>
        </nav>
        <div class="userlog">
            <div class="user">
                <img src="img/prof.png" alt="user avatar ">
            </div>  
            <div class="logout"><i class="fas fa-sign-out-alt"></i></div>         
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
                <li><a href="dashboard.html"><i class="fas fa-server"></i>Serwer</a></li>
                <li><a href="serverusers.html"><i class="fas fa-search"></i>Użytkownicy serwera</a></li>
                <li><a href="operations.html"><i class="fas fa-ban"></i>Operacje</a></li>
                <!-- <li><a href="#"><i class="fas fa-ban"></i></i>Banowanie</a></li>
                <li><a href="#"><i class="fas fa-gavel"></i>Kickowanie</a></li>
                <li><a href="#"><i class="fas fa-comment-slash"></i>Blokada czatu</a></li>
                <li><a href="#"><i class="fas fa-skull-crossbones"></i>Admin jail</a></li>
                <li><a href="#"><i class="fas fa-car"></i>Blokada jazdy</a></li>
                <li><a href="#"><i class="fas fa-car"></i>Nadaj gp</a></li> -->
                <li><a href="logs.html"><i class="fa fa-history"></i>Logi</a></li>
                <!-- <li><a href="#"><i class="far fa-address-card"></i>Logi panelu</a></li> -->
                <li><a href="panelusers.html"><i class="fas fa-users"></i></i>Użytkownicy panelu</a></li>
                <!-- <li><a href="#"><i class="fas fa-user-plus"></i>Dodaj użytkownika</a></li>
                <li><a href="#"><i class="fas fa-user-minus"></i>Usuń użytkownika</a></li> -->
                <li><a href="about.html"><i class="fas fa-info-circle"></i>Informacje ogólne</a></li>
            </ul>
        </nav>
        <div class="userlog">
            <div class="user">
                <img src="img/prof.png" alt="user avatar">
                <p>NexON39</p>
            </div>  
            <div class="logout"><i class="fas fa-sign-out-alt"></i></div>         
        </div>   
    </div>

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
    </div>

    <script src="js/aos.js"></script>
    <script src="js/charts.min.js"></script>
    <script src="js/chart.js"></script>
    <script src="js/app.js"></script>

</body>
</html>