<?php

try {
    //open connection to db
    include_once "shared/OpenDbConnection.php";

    //get messages from database
    //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM berichten ORDER BY id DESC LIMIT " .$numberOfMessages);
    $stmt->execute();
    $berichten = $stmt->fetchAll();

    //close connection to db
    //$conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}