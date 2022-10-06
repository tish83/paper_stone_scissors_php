<?php
session_start();
if (isset($_GET['wyloguj'])) {
	session_destroy(); 
	header("location: index.php");
}
include_once('connect.php');
$sql = "SELECT * FROM `stats` WHERE user = ? ORDER BY data DESC";
$stmt = $db->prepare($sql);
$user = $_SESSION['witaj'];
$stmt->bind_param("s", $user); 
$stmt->execute();
$wynik = $stmt->get_result();
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
        <a href="game.php">następna rozgrywka</a>
        <a href="?wyloguj">wyloguj</a>
        <h1>Statystyki rozgrywek: </h1>
        
        <?php
        echo '<table class="darkTable">';
        echo '<thead><tr><th>data</th><th>wygrał</th></tr></thead>';
        echo '<tbody>';
        $count=0;
        foreach ($wynik as $row) {
            $time = date('d-m-Y H:i:s',$row['data']);
            if($row['cmp']==1){
                $winner = "cmp"; 
                $count+=1;
            }else{
                $winner=$row['user'];
            } 
            echo '<tr>';
            echo "<td>$time</td> <td>$winner</td>";
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
        $pl_w = $wynik->num_rows-$count;
        ?>
        <h3>Wszystkie: <?=$wynik->num_rows;?></h3>
        <h3>Komputer wygrał: <?=$count;?> vs <?="{$row['user']} wygrał: $pl_w";?></h3>
    </div>
</body>
</html>