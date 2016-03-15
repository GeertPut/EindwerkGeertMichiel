<?php
if (!empty($_POST)) {
    if (!empty($_POST['title']) && strlen($_POST['title']) < 50
        && !empty($_POST['description'])
        && !empty($_POST['datetime'])
    ) {
        try {
            //open connection to db
            include_once "shared/OpenDbConnection.php";

            $stmt = $conn->prepare('
              UPDATE events
              SET title=:title, description=:description, start=:datetime
              WHERE id=:id;
            ');
            $stmt->execute([
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'datetime' => $_POST['datetime'],
                'id' => $_POST['id']
            ]);

            //close connection to db
            $conn = null;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
header('Location: ../ManageEvents.php');


