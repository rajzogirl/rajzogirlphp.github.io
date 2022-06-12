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
        <h3> POSZUKUJEMY NOWYCH PRACOWNIKÓW DO NASZEJ FIRMY! </h3>
        <p> Jeżeli szukasz pracy, to bardzo dobrze trafiłeś/aś. Gdy klikniesz przycisk "OFERTY PRACY" bedziesz mógł/mogła zapoznać się ze stanowiskami, które mamy do zaoferowania. Natomiast po wciśnięciu "OPIS OFERT" pokaże się opis przykładowych zadań w danym kierunku. </p>
        <form method="POST">
            <input type="submit" name="submit" value="OFERTY PRACY">
            <input type="submit" name="button" value="OPIS OFERT">
        </form>
        <div id="kod">
            <?php
            if(isset($_POST['submit'])){
                echo "<table border=2>";
                echo "<tr>"."<td>". "ID_OFERTY" ."</td>"."<td>". "NAZWA"."</td>"."<td>"."WYMAGANIA"."</td>"."</tr>";

                require_once "connect.php";
                $polacz=mysqli_connect($host, $user, $password, $name);
                if(mysqli_connect_errno())
                {
                    echo "blad polaczenia z baza";
                }
                else
                {
	
                    $zap="select oferty.ID_OFERTY,stanowiska.NAZWA,stanowiska.WYMAGANIA from stanowiska inner join oferty on oferty.ID_STAN=stanowiska.ID_STAN";
                    $wyn=mysqli_query($polacz,$zap);
                    while($row=mysqli_fetch_assoc($wyn))
                    {
                        echo "<tr>";
                        echo "<td>". $row['ID_OFERTY'] ."</td>";
                        echo "<td>". $row['NAZWA'] ."</td>";
                        echo "<td>". $row['WYMAGANIA'] ."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_close($polacz);
                }
            }
            ?>
            <?php
            if(isset($_POST['button'])){
                echo "<table border=2 >";
                echo "<tr>"."<td>". "ID_OFERTY" ."</td>"."<td>". "NAZWA"."</td>"."<td>"."OPIS"."</td>"."</tr>";

                require_once "connect.php";
                $polacz=mysqli_connect($host, $user, $password, $name);
                if(mysqli_connect_errno())
                {
                    echo "blad polaczenia z baza";
                }
                else
                {
	
                    $zap="select oferty.ID_OFERTY,stanowiska.NAZWA,stanowiska.OPIS from stanowiska inner join oferty on oferty.ID_STAN=stanowiska.ID_STAN";
                    $wyn=mysqli_query($polacz,$zap);
                    while($row=mysqli_fetch_assoc($wyn))
                    {
                        echo "<tr>";
                        echo "<td>". $row['ID_OFERTY'] ."</td>";
                        echo "<td>". $row['NAZWA'] ."</td>";
                        echo "<td>". $row['OPIS'] ."</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    mysqli_close($polacz);
                }
            }
            ?>
        </div>
        <p>Jeśli zainteresowała Cię jakaś oferta i chcesz wziąć udział w rozmowie kwalifikacyjnej naciśnij przycisk "DALEJ".</p>

        <form action="rozmowa.php" method="POST">
            <button> DALEJ </button>
        </form>
    </div>

    <div id="footer">
        <h2> Kontakt: </h2>
        <p> Sandra Paszkiewicz </p>
        <p><i> Sandra.Paszkiewicz.projekt@gmail.com </i></p>
        <p>tel. 000 111 222 </p>

    </div>

</body>
</html>