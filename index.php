<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>volleyball with friends</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-primary">
    <div style="padding-top: 15%;" class="container">
        <section class="text-dark p-3 text-center row">
            <div class="input-group w-50 pt-3 offset-4">
                <form method="get">
                    <input class="input-group-text" type="text" name="username" placeholder="username" required><br>
                    <input class="input-group-text" name="password" type="password" placeholder="password" required><br>
                    <button class="btn btn-success bg-dark btn-block" name="enter" value="enter">enter</button>
                    <button class="btn btn-success bg-dark btn-block" name="newUser" value="newUser">create</button>
                </form>
            </div>
            <div class="input-group w-50 pt-3 offset-4">
                <form method="get">
                    <input class="input-group-text" name="code" type="text" placeholder="code"></input><br>
                    <button class="btn btn-success bg-dark btn-block" name="search" value="search">search</button>
                </form>
            </div>
        </section>
    </div> 
</body>
</html>
<?php
ini_set('display_errors', '0'); //error off
$servername = "localhost";
$username = "root";
$password = "";
$db = "userdaten";

$user = $_GET["username"];
$pw = $_GET["password"];

$conn = new mysqli($servername, $username, $password, $db);

if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_GET["newUser"] == "newUser"){
    $sql_new_login = "INSERT INTO `login`(`username`, `password`) VALUES ('$user','$pw');";
    if ($conn->query($sql_new_login) === TRUE) {
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if($_GET["enter"] == "enter"){
    $sql_login = "SELECT * FROM `login` WHERE `username` = '$user' AND `password` = '$pw';";
    if (!$ergebnis2 = $conn->query($sql_login)) {
        //printf("Error: %s\n", $conn->error);
        $ergebnis2->close();
    }

    while($row = $ergebnis2->fetch_assoc()) {
        $user = $row["username"];
        $pw = $row["password"];
        header("Location: http://localhost/freiesthema/home.php");
        exit();
    }
}

if($_GET["search"] == "search") {
    $code = $_GET["code"];
    $sql_code = "SELECT * FROM `codes` WHERE `code` = $code;";
    if (!$ergebnis3 = $conn->query($sql_code)) {
        //printf("Error: %s\n", $conn->error);
        $ergebnis3->close();
    }

    while($row = $ergebnis3->fetch_assoc()) {
        $sport_art = $row["sportArt"];
        $t1 = $row["team1"];
        $t2 = $row["team2"];
        $time = $row["time"];
        $rounds = $row["rounds"];
        $date = $row["date"];
        $extra = $row["extra"];
        header("Location: http://localhost/freiesthema/code.php");
        exit();
    }
}
?>