<?php
session_start();

if (!isset($_POST['logowanie'])) {$msg='zaloguj się<br>';}
else
{
	$msg='';
	$login=htmlspecialchars(stripslashes(trim($_POST['login'])));
	$haslo=htmlspecialchars(stripslashes(trim($_POST['haslo'])));
	if (empty($login) || empty($haslo)) 
	{
	  $msg='Brak loginu lub hasła!';
	}
	else
	{
		include_once('connect.php');
					
		$sql="SELECT * FROM `users` WHERE `login` = ?";
		$stmt = $db->prepare($sql);		
		$stmt->bind_param("s", $login); 
		$stmt->execute();
		$wynik = $stmt->get_result();

		$ile_znaleziono = $wynik->num_rows;
		
		if ($ile_znaleziono>0) {
			$kolumna=$wynik->fetch_array();
			if(password_verify($haslo,$kolumna['pass'])){
				$_SESSION['msg']='Jesteś zalogowany'; 
				$_SESSION['witaj']=$login;
				header("location: game.php");
			}	
			else { $msg='Podałeś błedne hasło!';}			
		}
		else { $msg='Nie ma w bazie użytkownika o takim loginie!';}			
	}		
}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>Moja strona</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">	
</head>
<body>	
<div id="wrapper">       
    <h1>Papier Kamień Nożyce</h1>
	<form method="post" action="">			
		<input type="text" name="login">
		<input type="password" name="haslo">
		<button type="submit" name="logowanie">Loguj</button><br>			
		<span style="color: red;"><?=$msg;?></span>	
	</form>
</div>			
	

</body>
</html>