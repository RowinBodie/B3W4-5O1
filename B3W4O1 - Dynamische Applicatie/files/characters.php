<?php
$servername = "localhost";
$username = "pizzarol";
$password = "ccO6tMXHgyLsywsz";
$dbname = "characters";
try {
    $conn = new PDO("mysql:host=$servername;dbname=characters", $username, $password);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

    $stmt = $conn->prepare("SELECT * FROM characters where name = :naam;");
    $stmt->execute([":naam"=> urldecode($_GET['name'])]);
    $result = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $result[0]["name"] ?></title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cfad7c499b.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="nameHeader">
        <p id="headerName"><?= $result[0]["name"] ?></p>
        <a class="return" href="index.php"><i class="fas fa-arrow-left"></i>terug</a>
    </div>
    <div id="mid">
        <div  class="left">
            <img src="../avatars/images/<?=$result[0]['avatar']?>" class="pf"></img>
            <p id="text"><?=$result[0]["bio"]?></p>
            <div id="status" style="background-color:<?=$result[0]["color"]?>">
                <div id="split">
                    <p class="stats"><i id="heart" class="fas fa-heart"></i><?=$result[0]['health']?></p>
                    <p class="stats"><i id="fist" class="fas fa-fist-raised"></i><?=$result[0]['attack']?></p>
                    <p class="stats"><i id="shield" class="fas fa-shield-alt"></i><?=$result[0]['defense']?></p>
                </div>
                <div id="miep">
                    <p class="status"><span class="bold">Weapons: </span><?=$result[0]['weapon']?></p>
                    <p class="status"><span class="bold">Armor: </span><?=$result[0]['armor']?></p>
                </div>
            </div>
            
        </div>
    </div>
    <?php include("footer.php") ?>
</body>
</html>