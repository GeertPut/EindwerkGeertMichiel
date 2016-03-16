<?php
//Authorized page
include_once "shared/Authorize.php";

//variables
$pageTitle = "Administratie evenement";
$activeNav = 0;

?>
<!--site header-->
<?php
    include_once "shared/Header.php";
    include_once "shared/BackOfficeNav.php"
?>
<div id="contentContainerChangeEvent">
    <div id="evenementenContainer">
        <div>
            <?php
            if(isset($_GET['id'])){
                $idOfEvent = $_GET['id'];
                include_once "database/GetEvent.php";
                ?>

                <form action="database/EditEvent.php" method="post">
                    <h3>Evenement wijzigen</h3>
                    <ul>
                        <li>
                            <input type="text" value="<?php echo $event['title'] ?>" name="title" required />
                        </li>
                        <li>
                        <textarea placeholder="Beschrijving" rows="10" name="description" required><?php echo $event['description'] ?></textarea>
                        </li>
                        <li>
                            <input type="text" value="<?php echo $event['start'] ?>" name="datetime" pattern="[2][0-1][0-9][0-9][-][0-1][0-9][-][0-3][0-9]\s[1-2][0-9][:][0-6][0-9][:][0-6][0-9]" required />
                        </li>
                        <li>
                            <input type="submit" value="toevoegen">
                        </li>
                    </ul>
                    <input type="text" value="<?php echo $idOfEvent ?>" name="id" hidden>
                </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php include_once 'shared/Footer.php'; ?>
