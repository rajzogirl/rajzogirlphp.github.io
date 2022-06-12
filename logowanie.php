<html>
<head>
<title> LOGOWANIE </title>
<meta charset="utf-8">
<link rel="stylesheet" href="styl2.css">
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
        </ul>
    </nav> 
    <div id="main">
        <form method="POST">
            Login: <br><input type="text" name="login">
            <br>
            Hasło: <br> <input type="password" name="haslo">
            <br>
            <br>
            <input type="submit" name="submit" value="Zaloguj się">
        </form>
        <br>
<?PHP
if(isset($_POST['submit'])){
$login = $_POST['login'];
$haslo = $_POST['haslo'];

require_once "connect.php";
$polacz=mysqli_connect($host, $user, $password, $name);
if (mysqli_connect_errno())
{
	echo "Błąd połączenia z bazą";
}
	else
	{
	$zapytanie="SELECT * FROM uzytkownicy WHERE LOGIN='$login' AND HASLO='$haslo'";
	$wyn=mysqli_query($polacz,$zapytanie);
	if($ile=mysqli_num_rows($wyn));
		if($ile>0)
		{
			$wiersz=mysqli_fetch_assoc($wyn);
			$login = $wiersz['login'];
			
			$wynik=mysqli_free_result();
			header('Location:administrator.php');
		}
		else
		{
		echo "---------------------------------------------------------------------------------------------Błędny login lub hasło-------------------------------------------------------------------------------------------";	
		}
		mysqli_close($polacz);
	}
}
?>
    </div>
</body>
</html>