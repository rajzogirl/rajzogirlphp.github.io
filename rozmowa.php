<html>
<head>
<meta charset="utf-8">
<title> Obsługa działu kadr </title>
<link rel="stylesheet" href="styl.css">
</head>
<body>

    <div id="baner">
        <img src="zdjecia/baner.png">
    </div>

    <nav>    
        <ul>
            <li> <a href="index.php"> O FIRMIE </a></li>
            <li> <a href="pracownicy.php"> Szukasz pracy? </a></li>
            <li> <a href="logowanie.php">Tylko dla administratorów </a></li>
        </ul>
    </nav>

    <div id="main">
        <br>
        <h4>Wypełnij podanie:</h4>
        <form method="POST" id="tabela">
            <div class="row">
                <div class="col-20">
                    <label for="fname">Imie: </label>
                </div>
                <div class="col-80">
                    <input type="text" id="fname" name="imie" placeholder="Twoje imie: ">
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="lname">Nazwisko: </label>
                </div>
                <div class="col-80">
                    <input type="text" id="lname" name="nazwisko" placeholder="Twoje nazwisko: ">
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="zamieszkanie">Miejsce zamieszkania: </label>
                </div>
                <div class="col-80">
                    <input type="text" id="mname" name="miejsce" placeholder="Twoje imie: ">
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="wiek">Wiek: </label>
                </div>
                <div class="col-80">
                    <input type="number" id="wname" name="wiek">
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="wyksztalcenie">Wykształcenie: </label>
                </div>
                <div class="col-80">
                    <input type="text" id="wyname" name="wykszt" placeholder="Twoje imie: ">
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="oferta">ID oferty, która cię zainteresowała: </label>
                </div>
                <div class="col-80">
                    <input type="number" id="iname" name="oferta">
                </div>
            </div>
            <div class="row">
                <div class="col-20">
                    <label for="tele">Numer telefonu: </label>
                </div>
                <div class="col-80">
                    <input type="number" id="nname" name="telefon">
                </div>
            </div>
            <br>
            <input type="submit" name="submit" value="PRZEŚLIJ">
        </form>
        <?php
        if(isset($_POST['submit'])){
            $imie=$_POST['imie'];
            $nazwisko=$_POST['nazwisko'];
            $zam=$_POST['miejsce'];
            $wiek=$_POST['wiek'];
            $wyk=$_POST['wykszt'];
            $oferta=$_POST['oferta'];
            $tel=$_POST['telefon'];

            require_once "connect.php";

            $pol=mysqli_connect($host, $user, $password, $name);
            if(mysqli_connect_errno())
            {
                echo "blad polaczenia z baza";
            }
            else
            {
	
                $zap="INSERT INTO `podania` (`IMIE`, `NAZWISKO`, `MIASTO`, `WIEK`, `WYKSZTAŁCENIE`, `ID_OFERTY`, `TELEFON`) VALUES ('$imie', '$nazwisko', '$zam', '$wiek', '$wyk', '$oferta', '$tel')";
                $wyn=mysqli_query($pol,$zap);
                mysqli_close($pol);
            }
        }
        ?>
    </div>

    <div id="footer">
        <h2> Kontakt: </h2>
        <p> Sandra Paszkiewicz </p>
        <p><i> Sandra.Paszkiewicz.projekt@gmail.com </i></p>
        <p>tel. 000 111 222 </p>

    </div>
</body>
</html>