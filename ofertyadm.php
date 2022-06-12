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
            echo "<table border=2>";
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
                <input type="submit" name="lista" value="Lista ofert">
            </form>
            <?php
            if(isset($_POST['lista'])){
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
            <form method="POST">
                <div class="row">
                    <div class="col-20">
                        <label for="idname">ID stanowiska: </label>
                </div>
                    <div class="col-80">
                        <input type="text" id="idd" name="stan">
                    </div>
                </div>
                <br>
                <input type="submit" name="submit" value="DODAJ OFERTĘ">
            </form>
            <?php
            if(isset($_POST['submit'])){
                $stan=$_POST['stan'];

                require_once "connect.php";

                $pol=mysqli_connect($host, $user, $password, $name);
                if(mysqli_connect_errno())
                {
                    echo "blad polaczenia z baza";
                }
                else
                {
                    $zap2="INSERT INTO oferty (ID_STAN) values ('$stan')";
                    $wyn2=mysqli_query($pol,$zap2);
                    mysqli_close($pol);
                }
            }
            ?>
    <form method="POST">
        <div class="row">
            <div class="col-20">
                <label for="iname">ID stanowiska: </label>
            </div>
            <div class="col-80">
                <input type="text" id="idu" name="stano">
            </div>
        </div>
        <br>
        <input type="submit" name="usun" value="USUŃ OFERTĘ">
            </form>
            <?php
            if(isset($_POST['usun'])){
                $stano=$_POST['stano'];

                require_once "connect.php";

                $pol=mysqli_connect($host, $user, $password, $name);
                if(mysqli_connect_errno())
                {
                    echo "blad polaczenia z baza";
                }
                else
                {
                    $zap2="Delete from oferty where ID_STAN='$stano'";
                    $wyn2=mysqli_query($pol,$zap2);
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