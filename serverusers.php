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
                <h1>Użytkownicy serwera</h1>
            </div>
            <!-- input -->
            <div class="inputs">
                <form action="" method="post">
                    <div><input type="text" placeholder="UID"></div>
                    <div><input type="submit" value="Sprawdź"></div>
                </form>
            </div>
            <!-- playerstats -->
            <div class="inputs serverusers">
                <div class="playerstats">
                    <div>
                        <h2>Dane konta</h1>
                    </div>
                    <!-- stats -->
                        <div class="stat">
                            <p>UID: </p>
                            <p>002</p>
                        </div>
                        <div class="stat">
                            <p>Nick: </p>
                            <p>NexON39</p>
                        </div>
                        <div class="stat">
                            <p>Premium: </p>
                            <p>02-05-2012 20:20:32</p>
                        </div>
                        <div class="stat">
                            <p>Przegrany czas(minuty): </p>
                            <p>424122</p>
                        </div>
                        <div class="stat">
                            <p>Data rejestracji: </p>
                            <p>02-05-2012 20:20:32</p>
                        </div>
                        <div class="stat">
                            <p>Ostatnio na serwerze: </p>
                            <p>02-05-2012 20:20:32</p>
                        </div>
                </div>
                <div class="playerstats">
                    <div>
                        <h2>Dane postaci</h1>
                    </div>
                        <div class="stat">
                            <p>Skin: </p>
                            <p>12</p>
                        </div>
                        <div class="stat">
                            <p>Rasa: </p>
                            <p>Czarna</p>
                        </div>
                        <div class="stat">
                            <p>Data urodzenia: </p>
                            <p>02-02-2002</p>
                        </div>
                        <div class="stat">
                            <p>HP: </p>
                            <p>100</p>
                        </div>
                        <div class="stat">
                            <p>Gotówka przy sobie: </p>
                            <p>5231312$</p>
                        </div>
                        <div class="stat">
                            <p>Gotówka w banku: </p>
                            <p>512312314151$</p>
                        </div>
                        <div class="stat">
                            <p>Siła: </p>
                            <p>200</p>
                        </div>
                        <div class="stat">
                            <p>Kondycja: </p>
                            <p>523</p>
                        </div>
                        <div class="stat">
                            <p>Głód: </p>
                            <p>42</p>
                        </div>
                        <div class="stat">
                            <p>Umiejętności grafiti: </p>
                            <p>002</p>
                        </div>
                        <div class="stat">
                            <p>Prawa jazdy: </p>
                            <p>A B C U</p>
                        </div>
                        <div class="stat">
                            <p>Opis postaci: </p>
                            <p>super</p>
                        </div>
                        <div class="stat">
                            <p>Niespłacone mandayu: </p>
                            <p>100$</p>
                        </div>
                </div>
                <div class="playerstats">
                    <div>
                        <h2>Kary</h2>
                    </div>
                    <div class="stat">
                        <p>Blokada OOC: </p>
                        <p>00-00-0000 00:00:00</p>
                    </div>
                    <div class="stat">
                        <p>Blokada raportowania: </p>
                        <p>00-00-0000 00:00:00</p>
                    </div>
                    <div class="stat">
                        <p>Blokada bicia: </p>
                        <p>00-00-0000 00:00:00</p>
                    </div>
                    <div class="stat">
                        <p>Blokada tagowania: </p>
                        <p>00-00-0000 00:00:00</p>
                    </div>
                    <div class="stat">
                        <p>Blokada PW: </p>
                        <p>00-00-0000 00:00:00</p>
                    </div>
                    <div class="stat">
                        <p>Blokada jazdy: </p>
                        <p>00-00-0000 00:00:00</p>
                    </div>
                    <div class="stat">
                        <p>Admin jail: </p>
                        <p>brak</p>
                    </div>
                    <div class="stat">
                        <p>Więzienie: </p>
                        <p>brak</p>
                    </div>
                </div>
                <div class="playerstats">
                    <div>
                        <h2>Punkty karne</h2>
                    </div>
                    <div class="stat">
                        <p>Kat A: </p>
                        <p>0</p>
                    </div>
                    <div class="stat">
                        <p>Kat B: </p>
                        <p>2</p>
                    </div>
                    <div class="stat">
                        <p>Kat C: </p>
                        <p>2</p>
                    </div>
                    <div class="stat">
                        <p>Kat C1: </p>
                        <p>5</p>
                    </div>
                    <div class="stat">
                        <p>Kat L: </p>
                        <p>2</p>
                    </div>
                </div>
                <!-- fractions -->
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Frakcja</th>
                            <th>Ranga</th>
                            <th>Staż obecnie</th>
                            <th>Staż łącznie</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Straż pożarna</td>
                            <td>Strażak</td>
                            <td>231</td>
                            <td>523123</td>
                        </tr>
                    </table>
                    <!-- organisation -->
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Nazwa organizacji</th>
                            <th>Ranga</th>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>GRNG</td>
                            <td>Anioł</td>
                        </tr>
                    </table>
                    <!-- houses -->
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Nazwa domu</th>
                            <th>Opłacony do</th>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Willa</td>
                            <td>32-01-2002</td>
                        </tr>
                    </table>
                    <!-- buissnes -->
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Nazwa budynku</th>
                            <th>Opłacony do</th>
                        </tr>
                        <tr>
                            <td>321</td>
                            <td>Sklep</td>
                            <td>32-01-2002</td>
                        </tr>
                    </table>
                    <!-- veh -->
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Nazwa pojazdu</th>
                            <th>Przebieg</th>
                            <th>Przechowalnia</th>
                        </tr>
                        <tr>
                            <td>15231</td>
                            <td>Jester</td>
                            <td>52312313</td>
                            <td>tak</td>
                        </tr>
                    </table>
                    <!-- ach -->
                    <table>
                        <tr>
                            <th>Nazwa</th>
                            <th>Opis</th>
                            <th>Ilość</th>
                            <th>Data</th>
                        </tr>
                        <tr>
                            <td>Lorem, ipsum.</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus quidem totam corporis tempore, ipsam molestiae eius aspernatur accusamus impedit voluptatum!</td>
                            <td>90</td>
                            <td>23-11-2002</td>
                        </tr>
                        <tr>
                            <td>Lorem, ipsum.</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Debitis, consectetur. Perspiciatis nemo, dicta dolor a dolorum sunt laborum itaque natus accusamus magni rem doloremque unde beatae id officiis odio vitae?</td>
                            <td>90</td>
                            <td>23-11-2002</td>
                        </tr>
                    </table>
            </div>
        </div>
    </div>

    <script src="js/aos.js"></script>
    <script src="js/app.js"></script>

</body>
</html>