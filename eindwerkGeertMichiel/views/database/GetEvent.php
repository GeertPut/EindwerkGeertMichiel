<?php

try {
    //open connection to db
    include_once "shared/OpenDbConnection.php";

    //get future events from database
    //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT id, title, description, start FROM events WHERE id = :id");
    $stmt->execute([
        'id' => $idOfEvent
    ]);
    $event = $stmt->fetch();

    //close connection to db
    //$conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}