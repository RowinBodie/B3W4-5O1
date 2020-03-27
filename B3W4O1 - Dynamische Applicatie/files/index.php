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

    $stmt = $conn->prepare("SELECT id, name, avatar, health, attack, defense  FROM characters order by name;");
    $stmt->execute();
    $result = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>characters</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cfad7c499b.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include("header.php");
    ?>
    <div id="mid">
        <?php foreach($result as $array){ ?>
            <div class="box">
                <img src="../avatars/images/<?=$array['avatar']?>" class="circle"></img>
                <p class="name"><?=$array['name']?></p>
                <div class="statBox">
                    <p class="stat"><i id="heart" class="fas fa-heart"></i><?=$array['health']?></p>
                    <p class="stat"><i id="fist" class="fas fa-fist-raised"></i><?=$array['attack']?></p>
                    <p class="stat"><i id="shield" class="fas fa-shield-alt"></i><?=$array['defense']?></p>
                </div>
                <a class="view" href="characters.php?name=<?= urlencode($array['name'])  ?>"><i id="eye" class="fas fa-eye"></i>Bekijken</a>
            </div>
        <?php } ?>
    </div>
    <?php
        include("footer.php");
    ?>
</body>
</html>
