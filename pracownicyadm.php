<html>
<head>
<meta charset="utf-8">
<title> Obsługa działu kadr </title>
<link rel="stylesheet" href="styl.css">
</head>
<body>

    <div id="baner">
        <img src="zdjecia/admin.png">
    </div>

    <nav>    
        <ul>
            <li> <a href="index.php"> O FIRMIE </a></li>
            <li> <a href="pracownicy.php"> Szukasz pracy? </a></li>
            <li> <a href="logowanie.php">Tylko dla administratorów </a></li>
            <ul>
                <li><a href="pracownicyadm.php"> Pracownicy </a></li>
                <li><a href="ofertyadm.php"> Oferty </a></li>
                <li><a href="podania.php"> Podania </a></li>
            </ul>
        </ul>
    </nav>
    <div id="main">
        <form method="POST">
            <input type="submit" value="Stanowiska">
        </form>
        <div id="kod">
            <?php
            echo "<table border=2 >";
            echo "<tr>"."<td>". "ID_STAN"."</td>"."<td>"."NAZWA"."</td>"."</tr>";

            require_once "connect.php";
            $polacz=mysqli_connect($host, $user, $password, $name);
            if(mysqli_connect_errno())
            {
                echo "blad polaczenia z baza";
            }
            else
            {
                $zap3="select ID_STAN,NAZWA from stanowiska";
                $wyn3=mysqli_query($polacz,$zap3);
                while($row=mysqli_fetch_assoc($wyn3))
                {
                    echo "<tr>";
                    echo "<td>". $row['ID_STAN'] ."</td>";
                    echo "<td>". $row['NAZWA'] ."</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_close($polacz);
            }
            ?>
            <br>
            <form method="POST">
                <input type="submit" name="lista" value="Lista pracowników">
            </form>
            <?php
            if(isset($_POST['lista'])){
                echo "<table border=2 >";
                echo "<tr>"."<td>". "IMIE"."</td>"."<td>"."NAZWISKO"."</td>"."<td>"."ZAMIESZKANIE"."</td>"."<td>"."NAZWA"."</td>"."<td>"."TELEFON"."</td>"."</tr>";

                require_once "connect.php";
                $polacz=mysqli_connect($host, $user, $password, $name);
                if(mysqli_connect_errno())
                {
                    echo "blad polaczenia z baza";
                }
                else
                {
                    $zap1="select pracownicy.IMIE, pracownicy.NAZWISKO, pracownicy.ZAMIESZKANIE, stanowiska.NAZWA, pracownicy.TELEFON from pracownicy inner join stanowiska on pracownicy.ID_STAN=stanowiska.ID_STAN";
                    $wyn=mysqli_query($polacz,$zap1);
                    while($row=mysqli_fetch_assoc($wyn))
                    {
                        echo "<tr>";
                        echo "<td>". $row['IMIE'] ."</td>";
                        echo "<td>". $row['NAZWISKO'] ."</td>";
                        echo "<td>". $row['ZAMIESZKANIE'] ."</td>";
                        echo "<td>". $row['NAZWA'] ."</td>";
                        echo "<td>". $row['TELEFON'] ."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_close($polacz);
                }
            }
            ?>
            <form method="POST">
                <div class="row">
                    <div class="col-20">
                        <label for="fname">Imie: </label>
                    </div>
                    <div class="col-80">
                        <input type="text" id="fname" name="imie" placeholder="Imie: ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="lname">Nazwisko: </label>
                    </div>
                    <div class="col-80">
                        <input type="text" id="lname" name="nazwisko" placeholder="Nazwisko: ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="zamieszkanie">Miejsce zamieszkania: </label>
                    </div>
                    <div class="col-80">
                        <input type="text" id="mname" name="miejsce" placeholder="Miejsce zamieszkania: ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="stanowisko">Id stanowiska: </label>
                    </div>
                    <div class="col-80">
                        <input type="text" id="stanowisko" name="stan" placeholder="Id stanowiska:">
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="tele">Numer telefonu: </label>
                    </div>
                    <div class="col-80">
                        <input type="number" id="tele" name="telefon" placeholder="Numer telefonu: ">
                    </div>
                </div>
                <br>
                <input type="submit" name="submit" value="DODAJ PRACOWNIKA">
            </form>
            <?php
            if(isset($_POST['submit'])){
                $imie=$_POST['imie'];
                $nazwisko=$_POST['nazwisko'];
                $zam=$_POST['miejsce'];
                $stan=$_POST['stan'];
                $tel=$_POST['telefon'];

                require_once "connect.php";

                $pol=mysqli_connect($host, $user, $password, $name);
                if(mysqli_connect_errno())
                {
                    echo "blad polaczenia z baza";
                }
                else
                {
	
                    $zap2="INSERT INTO `pracownicy` (`IMIE`, `NAZWISKO`, `ZAMIESZKANIE`, `ID_STAN`, `TELEFON`) VALUES ('$imie', '$nazwisko', '$zam', '$stan', '$tel')";
                    $wyn2=mysqli_query($pol,$zap2);
                    mysqli_close($pol);
                }
            }
            ?>

            <form method="POST">
                <div class="row">
                    <div class="col-20">
                        <label for="fname">Imie: </label>
                    </div>
                    <div class="col-80">
                        <input type="text" id="fname" name="imie" placeholder="Imie: ">
                    </div>
                </div>
                <div class="row">
                    <div class="col-20">
                        <label for="lname">Nazwisko: </label>
                    </div>
                    <div class="col-80">
                        <input type="text" id="lname" name="nazwisko" placeholder="Nazwisko: ">
                    </div>
                </div>
                <input type="submit" name="usun" value="USUŃ PRACOWNIKA">
            </form>
            <?php
            if(isset($_POST['usun'])){
                $imie=$_POST['imie'];
                $nazwisko=$_POST['nazwisko'];

                require_once "connect.php";

                $pol=mysqli_connect($host, $user, $password, $name);
                if(mysqli_connect_errno())
                {
                    echo "blad polaczenia z baza";
                }
                else
                {
	
                    $zap4="Delete from pracownicy where IMIE='$imie' and NAZWISKO='$nazwisko'";
                    $wyn4=mysqli_query($pol,$zap4);
                    mysqli_close($pol);
                }
            }
            ?>

        </div>
    </div>

    <div id="footer">
        <h2> Kontakt: </h2>
        <p> Sandra Paszkiewicz </p>
        <p><i> Sandra.Paszkiewicz.projekt@gmail.com </i></p>
        <p>tel. 000 111 222 </p>

    </div>
</body>
</html>