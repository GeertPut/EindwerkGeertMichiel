<?php
if(isset($_GET['id'])){
    try {
        //open connection to db
        include_once "shared/OpenDbConnection.php";

        //get future events from database
        //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("DELETE FROM events WHERE id = " .$_GET['id']);
        $stmt->execute();

        //close connection to db
        $conn = null;
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
}
header('Location: ../ManageEvents.php');


