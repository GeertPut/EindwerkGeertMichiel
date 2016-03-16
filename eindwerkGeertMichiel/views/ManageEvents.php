<?php
//Authorized page
include_once "shared/Authorize.php";

//variables
$pageTitle = "Administratie evenementen";
$activeNav = 0;

?>
<!--site header-->
<?php
    include_once "shared/Header.php";
    include_once "shared/BackOfficeNav.php"
?>
<div id="contentContainerManageEvents">
    <div id="evenementenContainer">
        <?php
        //get events from database
        $numberOfEvents = 999;
        include_once "database/GetEvents.php"; ?>

        <?php
        foreach ($events as $event) {
            ?>
            <table>
                <tr>
                    <th>
                        <?php echo "<h3>" . $event['title'] . "</h3>"; ?>
                    </th>
                </tr>
                <tr>
                    <td>
                        <?php echo "<p>" . $event['description'] . "</p>"; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo "<time>" . $event['start'] . "</time>"; ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php
                        echo "<a href='ChangeEvent.php?id=" . $event['id'] . "'>Bewerken</a></ br>";
                        echo "<a href='database/DeleteEvent.php?id=" . $event['id'] . "'>Verwijderen</a>";
                        ?>
                    </td>
                </tr>
            </table>
        <?php }; ?>
        <form action="database/AddEvent.php" method="post">
            <hr />
            <h3>Evenement toevoegen</h3>
            <ul>
                <li>
                    <input type="text" placeholder="Titel" name="title" required />
                </li>
                <li>
                    <textarea rows="10" name="description" placeholder="Beschrijving van het event" required></textarea>
                </li>
                <li>
                    <input type="datetime" placeholder="YYYY-MM-DD HH:MM:SS" name="datetime" pattern="[2][0-1][0-9][0-9][-][0-1][0-9][-][0-3][0-9]\s[1-2][0-9][:][0-6][0-9][:][0-6][0-9]" required/>
                </li>
                <li>
                    <input type="submit" value="toevoegen">
                </li>
            </ul>

        </form>
    </div>

</div>
<?php include_once 'shared/Footer.php'; ?>
