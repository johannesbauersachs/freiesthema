<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-primary">
    <div style="padding-top: 5%;" class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "userdaten";
        
        $conn = new mysqli($servername, $username, $password, $db);

        $sportart = $_GET["sportart"];
        $t1 = $_GET["t1"];
        $t2 = $_GET["t2"];
        $time = $_GET["time"];
        $rounds = $_GET["rounds"];
        $date = $_GET["date"];
        $extra = $_GET["extra"];
        echo "<p id='time-js'>$time</p>";
        $p1 = 0;
        $p2 = 0;
        /*
        $sql_abfrage = "SELECT `code` FROM `codes` WHERE `team1` = '$t1' AND `team2` = '$t2' AND `time` = $time;";
        if (!$ergebnis = $conn->query($sql_abfrage)) {
            printf("Error: %s\n", $conn->error);
            $ergebnis->close();
        }
    
        while($row = $ergebnis->fetch_assoc()) {
            $code = $row["code"];
            exit();
        }
        echo $code;
        
        $test = $_SESSION["test"];*/
        ?>
        <div>
            <p id='time-js'><?php $time;?></p>
            <h2>Team1:<?php echo $t1;?></h2>
            <h2><a id="clicks" name="points1" value="points1">0</a></h2>
            <button type="button" onClick="onClick()">+1</button>
            <button type="button" onClick="takeClicks()">-1</button>
        </div>
        <div>
            <h1>Time:<p id="demo"></p></h1>
        <form action="home.php">
            <button type="submit" name="finish">finish</button>
        </form>
        </div>
        <div>
            <h2>Team2:<?php echo $t2;?></h2>
            <h2><a id="clicks2" name="points2" value="points2">0</a></h2>
            <button type="button" onClick="onClick2()" value="1">+1</button>
            <button type="button" onClick="takeClicks2()">-1</button>
        </div>
        <script type="text/javascript" src="game.js">
            var time = <?php echo $time?>;
            var countDownDate = new Date(time).getTime();
            var x = setInterval(function() {
            var now = new Date().getTime();     
            var distance = countDownDate - now;
            
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            document.getElementById("demo").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";
                
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>
    </div>
</body>
</html>
<?php
$points1 = $_GET["points1"];
$points2 = $_GET["points2"];
if($sportart == "Volleyball"){
    $max_points = 25;
    if($points1 && $points2 == $max_points){
        $max_points += 1;
    } elseif($points1 == 25 and $points2 < 24){
        //team 1 oder team2 hat 25 und das zweite team weniger als 24
        //dann gewinner == 25 
        $winner = $t1;
        echo "alert('winner: Team1')";
    } elseif($points2 == 25 and $points1 < 24){
        $winner = $t2;
        echo "alert('winner: Team2')";
    }
}

?>