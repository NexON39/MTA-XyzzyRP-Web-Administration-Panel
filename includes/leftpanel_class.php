<?php
    class leftpanel
    {
        public function showLeftMobilePanel() {
            echo "
                <div class='leftpanel-mobile flex'>
                    <div class='logo'>
                        <i class='fas fa-bars btn-leftpanel-mobile'></i>
                    </div>
                    <nav class='navbar'>
                        <ul>
                            <li><a href='dashboard.php'><i class='fas fa-server'></i></a></li>
                            <li><a href='serverusers.php'><i class='fas fa-search'></i></a></li>
                            <li><a href='operations.php'><i class='fas fa-ban'></i></i></a></li>
                            <li><a href='logs.php?page=1'><i class='fa fa-history'></i></a></li>
                            <li><a href='panelusers.php'><i class='fas fa-users'></i></a></li>
                            <li><a href='about.php'><i class='fas fa-info-circle'></i></a></li>
                            <li><a href='settings.php'><i class='fa-solid fa-gear'></i></a></li>
                        </ul>
                    </nav>
                    <div class='userlog'>
                        <div class='logout'><a href='src/logout.php'><i class='fas fa-sign-out-alt'></i></a></div>
                    </div>
                </div>
            ";
        }

        public function showLeftPanel() {
            echo "
                <div class='leftpanel flex'>
                    <div class='logo'>
                        <h1>XyzzyRP AP</h1>
                        <i class='fas fa-bars btn-leftpanel'></i>
                    </div>
                    <nav class='navbar'>
                        <ul>
                            <li><a href='dashboard.php'><i class='fas fa-server'></i>Serwer</a></li>
                            <li><a href='serverusers.php'><i class='fas fa-search'></i>Użytkownicy serwera</a></li>
                            <li><a href='operations.php'><i class='fas fa-ban'></i>Operacje</a></li>
                            <li><a href='logs.php?page=1'><i class='fa fa-history'></i>Logi</a></li>
                            <li><a href='panelusers.php'><i class='fas fa-users'></i></i>Użytkownicy panelu</a></li>
                            <li><a href='about.php'><i class='fas fa-info-circle'></i>Informacje ogólne</a></li>
                            <li><a href='settings.php'><i class='fa-solid fa-gear'></i>Ustawienia</a></li>
                        </ul>
                    </nav>
                    <div class='userlog'>
                        <div class='user'>
                            <p>";           
                                if(isset($_SESSION['user']))
                                    echo $_SESSION['user'];
            echo            "</p>
                        </div> 
                        <div class='logout'><a href='src/logout.php'><i class='fas fa-sign-out-alt'></i></a></div>
                    </div> 
                </div>
            ";
        }
    }
?>