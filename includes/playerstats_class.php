<?php
    // XyzzyRP Administration Panel Project
    // Author: NexON39
    // Discord: NexON39#5665
    class playerstats extends dbconnect
    {
        public function playerExist($uid) {
            $q = "SELECT * FROM lss_users WHERE id=$uid";
            if($this->connect()->query($q)->num_rows>0)
                return true;
            else
                return false;
        }

        public function getGenerallyStats($uid) {
            $q = "SELECT 
            lss_characters.userid, lss_characters.imie, lss_characters.nazwisko, lss_characters.hp, lss_characters.skin, lss_characters.lastseen, lss_characters.money, lss_characters.bank_money, lss_characters.playtime, lss_characters.created, lss_users.premium, lss_characters.rasa, lss_characters.data_urodzenia, lss_characters.energy, lss_characters.stamina, lss_characters.ab_spray, lss_characters.pjA, lss_characters.pjB, lss_characters.pjL, lss_characters.opis, lss_users.blokada_ooc, lss_users.blokada_bicia, lss_users.blokada_pm, lss_users.blokada_aj, lss_characters.hunger
            FROM lss_characters, lss_users 
            WHERE lss_characters.userid=$uid AND lss_users.id=$uid";
            if($res = $this->connect()->query($q))
                $row = $res->fetch_array();
            return $row; 
        }

        public function getFactionsStats($uid) {
            $q = "SELECT character_id, faction_id, rank, dutytime, totalduty FROM lss_character_factions WHERE character_id=$uid";
            $main = $this->connect()->query($q);
            while($row = $main->fetch_array()) {
                $q = "SELECT name FROM lss_faction WHERE id=$row[1]";
                if($res = $this->connect()->query($q))
                    $faction_name = $res->fetch_array();
    
                $q = "SELECT name FROM lss_faction_ranks WHERE faction_id=$row[1] AND rank_id=$row[2]";
                if($res = $this->connect()->query($q))
                    $faction_rank = $res->fetch_array();

                echo "<tr>";
                        echo "<td>$row[1]</td>";
                        $row[1] = $faction_name[0];
                        $row[2] = $faction_rank[0];
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";
                        echo "<td>$row[4]</td>";
                echo "</tr>";
            }
        }

        public function getOrgStats($uid) {
            $q = "SELECT cc.skin,c.id co_id,c.name co_name,cc.rank co_rank,cr.name co_rank_name from lss_character_co cc JOIN lss_co_ranks cr ON cr.co_id=cc.co_id AND cr.rank_id=cc.rank JOIN lss_co c ON c.id=cc.co_id WHERE cc.character_id=$uid";
            if($res = $this->connect()->query($q))
                $row = $res->fetch_array();
            return $row;
        }

        public function getHouseStats($uid) {
            $q = "SELECT id, descr, paidTo FROM lss_domy WHERE ownerid=$uid";
            if($res = $this->connect()->query($q)) {
                while($row = $res->fetch_array()) {
                    echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                    echo "</tr>";
                }
            }
        }

        public function getBuildStats($uid) {
            $q = "SELECT lss_budynki.id, lss_budynki.descr, lss_budynki.paidTo 
            FROM lss_budynki 
            JOIN lss_budynki_owners 
            ON  lss_budynki.id = lss_budynki_owners.budynek_id 
            WHERE lss_budynki_owners.character_id=$uid";
            if($res = $this->connect()->query($q)) {
                while($row = $res->fetch_array()) {
                    echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                    echo "</tr>";
                }
            }
        }

        public function getVehStats($uid) {
            $q = "SELECT id, model, przebieg, przechowalnia FROM lss_vehicles WHERE owning_player=$uid";
            if($res = $this->connect()->query($q)) {
                while($row = $res->fetch_array()) {
                    if($row[3]==0)
                        $row[3] = "Nie";
                    else if($row[3]==1)
                        $row[3] = "Tak";
                    echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";
                    echo "</tr>";
                }
            }
        }

        public function getPlayerStats() {
            if((!empty($_POST['playerstat_uid'])) && (is_numeric($_POST['playerstat_uid'])==true) && (isset($_POST['playerstat_btn']))) {
                $playerstat_uid = $_POST['playerstat_uid'];
                $_playerstat_uid = mysqli_real_escape_string($this->connect(), $playerstat_uid);
                // table
                if($this->playerExist($_playerstat_uid)==true) {
                    $gendata = $this->getGenerallyStats($_playerstat_uid);
                    echo "<div class='playerstats'>";
                        echo "<div>";
                            echo "<h2>Dane konta</h1>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>UID: </p>";
                            echo "<p>$gendata[0]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Nick: </p>";
                            echo "<p>$gendata[1]_$gendata[2]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Premium: </p>";
                            echo "<p>$gendata[10]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Przegrany czas(minuty): </p>";
                            echo "<p>$gendata[8]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Data rejestracji: </p>";
                            echo "<p>$gendata[9]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Ostatnio na serwerze: </p>";
                            echo "<p>$gendata[5]</p>";
                        echo "</div>";
                    echo "</div>";
    
                    echo "<div class='playerstats'>";
                        echo "<div>";
                            echo "<h2>Dane postaci</h1>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Skin: </p>";
                            echo "<p>$gendata[4]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Rasa: </p>";
                            echo "<p>$gendata[11]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Data urodzenia: </p>";
                            echo "<p>$gendata[12]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>HP: </p>";
                            echo "<p>$gendata[3]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Gotówka przy sobie: </p>";
                            echo "<p>$gendata[6]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Gotówka w banku: </p>";
                            echo "<p>$gendata[7]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Siła: </p>";
                            echo "<p>$gendata[13]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Kondycja: </p>";
                            echo "<p>$gendata[14]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Głód: </p>";
                            echo "<p>$gendata[24]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Umiejętności grafiti: </p>";
                            echo "<p>$gendata[15]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Prawa jazdy: </p>";
                            echo "<p>$gendata[16] $gendata[17] $gendata[18]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Opis postaci: </p>";
                            echo "<p>$gendata[19]</p>";
                        echo "</div>";
                    echo "</div>";
    
                    echo "<div class='playerstats'>";
                        echo "<div>";
                            echo "<h2>Kary</h1>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Blokada OOC: </p>";
                            echo "<p>$gendata[20]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Blokada bicia: </p>";
                            echo "<p>$gendata[21]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Blokada PW: </p>";
                            echo "<p>$gendata[22]</p>";
                        echo "</div>";
                        echo "<div class='stat'>";
                            echo "<p>Więzienie: </p>";
                            echo "<p>$gendata[23]</p>";
                        echo "</div>";
                    echo "</div>";
    
                    echo "<table>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Frakcja</th>";
                            echo "<th>Ranga</th>";
                            echo "<th>Staż obecnie</th>";
                            echo "<th>Staż łącznie</th>";
                        echo "</tr>";
                        $this->getFactionsStats($_playerstat_uid);
                    echo "</table>";
                    
                    $orgdata = $this->getOrgStats($_playerstat_uid);
                    echo "<table>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Nazwa organizacji</th>";
                            echo "<th>Ranga</th>";
                        echo "</tr>";
                        echo "<tr>";
                            echo "<td>$orgdata[1]</td>";
                            echo "<td>$orgdata[2]</td>";
                            echo "<td>$orgdata[4]</td>";
                        echo "</tr>";
                    echo "</table>";
    
                    echo "<table>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Nazwa domu</th>";
                            echo "<th>Opłacony do</th>";
                        echo "</tr>";
                        $this->getHouseStats($_playerstat_uid);
                    echo "</table>";
    
                    echo "<table>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>Nazwa budynku</th>";
                            echo "<th>Opłacony do</th>";
                        echo "</tr>";
                        $this->getBuildStats($_playerstat_uid);
                    echo "</table>";
    
                    echo "<table>";
                        echo "<tr>";
                            echo "<th>ID</th>";
                            echo "<th>ID modelu pojazdu</th>";
                            echo "<th>Przebieg</th>";
                            echo "<th>Przechowalnia</th>";
                        echo "</tr>";
                        $this->getVehStats($_playerstat_uid);
                    echo "</table>";
                } else
                    echo "<div class='nodata'>Nie znaleziono podanego użytkownika</div>";
            } else
                echo "<div class='nodata'>Brak danych do wyświetlenia</div>";
        }
    }
?>