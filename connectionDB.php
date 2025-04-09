<?php
    $host = "localhost";
    $dbname = "esp_news";
    $username = "root";
    $password = "";

    try
    {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        die("Erreur de connection a la base de donnees : " . $e->getMessage());
    }

?>