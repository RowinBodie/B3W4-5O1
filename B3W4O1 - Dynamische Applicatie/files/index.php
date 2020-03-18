<?php
$servername = "localhost";
$username = "pizzarol";
$password = "ccO6tMXHgyLsywsz";
$dbname = "characters";
try {
    $conn = new PDO("mysql:host=$servername;dbname=characters", $username, $password);
    // set the PDO error mode to exception
    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

    $stmt = $conn->prepare("SELECT id, name, avatar, health, attack, defense  FROM characters;");
    $stmt->execute();
    $result = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <img src="../avatars/images/<?=$result['0']['avatar']?>"></img>
</body>
</html>
