<?php
session_start();

if (isset($_GET['wyloguj'])) {
	session_destroy(); 
	header("location: index.php");
}

$next=False;
$msg ="";
$win="";
$player = "{$_SESSION['witaj']}";
$cmp = "cmp";
include_once('connect.php');

if(empty($_SESSION['licznik_cmp']))$_SESSION['licznik_cmp'] = 0;
if(empty($_SESSION['licznik_player']))$_SESSION['licznik_player'] = 0;


if(!empty($_POST['game'])){    

    $player = $_POST['game'];
    $tbl = ["papier", "kamień", "nożyce"];
    $cmp = $tbl[array_rand($tbl)];
    
    if($player==$cmp){
        $msg .= "Remis<br>";
    } 
    elseif (($player == "papier" && $cmp == "kamień") || ($player == "kamień" && $cmp == "nożyce") || ($player == "nożyce" && $cmp == "papier"))
    {
        $msg .= "Wygrałeś!<br>";
        $_SESSION['licznik_player']+=1;
    }else{
        $msg .= "Przegrałeś :(<br>";
        $_SESSION['licznik_cmp']+=1;
    }       
    
    #jeżeli rozgrywka została zakończona
    if($_SESSION['licznik_player'] == 3 || $_SESSION['licznik_cmp'] == 3) {
        if($_SESSION['licznik_cmp'] == 3){
            $win="Przegrałeś starcie :(<br>";
            $score = 1;
        } elseif ($_SESSION['licznik_player'] == 3){
            $win="Wygrałeś starcie :)<br>";
            $score = 0;
        }
        
        $_SESSION['licznik_cmp']=0;
        $_SESSION['licznik_player']=0;
        $next = True;
        $sql = "INSERT INTO `stats`(`data`, `cmp`, `user`) VALUES (?, ?, ?)";
        $stmt = $db->prepare($sql);
        $user = $_SESSION['witaj'];
        $czas = time();
        $stmt->bind_param("iis", $czas,$score,$user); 
        $stmt->execute();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>   
    <div id="wrapper">       
        <h1>Papier Kamień Nożyce</h1>
        <h3><?='Witaj: '.$_SESSION['witaj'].'<br>';?></h3>           
    <?php
    if(!$next){?>
        <div id="players">
            <div class="player">
                <h2>Player</h2>
                <h1><?=$_SESSION['licznik_player'];?></h1>
                <h1><?=$player;?></h1>
            </div>
            <div class="player">
                <h2>Cmp</h2>
                <h1><?=$_SESSION['licznik_cmp'];?></h1>
                <h1><?=$cmp;?></h1>
            </div>
        </div>
        <h2><?=$msg;?></h2>
            <div class="user-choose">
            <form action="" method="post">
                <button type="submit" value="papier" name="game" class="btn p"></button>
                <button type="submit" value="kamień" name="game" class="btn k"></button>
                <button type="submit" value="nożyce" name="game" class="btn n"></button>
            </form>
        </div>
    <?php
    }else{
    ?>
        <h2><?=$win;?></h2>
        <a href="game.php?next=False">następna rozgrywka</a>
    <?php
    }
    ?>
        <a href="stats.php">sprawdź statystyki</a>
        <a href="?wyloguj">wyloguj</a>
    </div>
</body>
</html>        