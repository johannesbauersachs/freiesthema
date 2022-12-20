<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-primary">
    <div style="padding-top: 5%;" class="container">
        <div class="input-group w-50 pt-3 offset-4">
            <?php
            ini_set('display_errors', '0'); //error off
            $sportart = $_GET["sportart"];
            $date = $_GET["date"];
            $winner;
            ?>
            <h2>History</h2>
            <div>
                <p>Datum:<?php echo "";?> </p><br>
                <p>Name: </p><br>
                <p>Winner: </p><br>
            </div>
        </div>
        <section class="text-dark p-3 text-center row">
            <div class="input-group w-50 pt-3 offset-4">
                <form method="get">
                    <h2>new game</h2>
                    <input class="input-group-text" type="text" name="sport_art" placeholder="Sport Art" required>
                    <input class="input-group-text mt-1" type="text" name="t1" placeholder="Team1" required>
                    <input class="input-group-text mt-1" type="text" name="t2" placeholder="Team2" required>
                    <input class="input-group-text mt-1" type="text" name="time" placeholder="Zeit in min" required>
                    <input class="input-group-text mt-1" type="text" name="rounds" placeholder="Runden" required>
                    <input class="input-group-text mt-1" type="text" name="date" placeholder="Datum" required>
                    <input class="input-group-text mt-1" type="text" name="extra" placeholder="Extra">
                    <button class="btn btn-success bg-dark btn-block mt-1" type="submit" name="start" value="start">start</button>
                </form>
            </div>
            <div style="padding-top: 20%;" class="input-group w-50">
                <form method="get">
                    <button class="btn btn-success bg-dark btn-block mt-1" type="submit" name="logout" value="logout">Logout</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
<?php
sesssion_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "userdaten";

$conn = new mysqli($servername, $username, $password, $db);

if($_GET["logout"] == "logout"){
    header("Location: http://localhost/freiesthema/index.php");
    exit();
}

if($_GET["start"] == "start"){
    $code = 0;
    $code = $code + rand(0,10000);

    if($extra == ""){
        $extra = "0";
    }
    $sportart = $_GET["sport_art"];
    $team1 = $_GET["t1"];
    $team2 = $_GET["t2"];
    $time = $_GET["time"];
    $rounds = $_GET["rounds"];
    $date = $_GET["date"];
    $extra = $_GET["extra"];
    $sql_code_upload = "INSERT INTO `codes`(`code`, `sportArt`, `team1`, `team2`, `time`, `rounds`, `date`, `extra`) VALUES ('$code','$sportart','$team1','$team2','$time','$rounds','$date','$extra')";
    if ($conn->query($sql_code_upload) === TRUE) {
        echo "New record created successfully";
        header("Location: http://localhost/freiesthema/game.php");
        exit();
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$_SESSION["test"] = "test";
$test = "test";
?>