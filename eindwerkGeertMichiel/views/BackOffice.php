<!--variables-->
<?php
//Authorized page
include_once "shared/Authorize.php";

//variables
$pageTitle = "Administratie algemeen";
$activeNav = 0;

?>
<!--site header-->
<?php include_once "shared/Header.php" ?>
    <div id="contentContainerBackoffice">
        <article>
            <h2>Evenementen</h2><a href="ManageEvents.php">Beheren</a>
            <div id="evenementenContainer">
                <?php
                //get events from database
                $numberOfEvents = 4;
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
                    </table>
                <?php }; ?>
            </div>
            <h2>berichten</h2>
            <div id="berichtenContainer">

                <?php
                //get messages from database
                $numberOfMessages = 10;
                include_once 'database/GetMessages.php';
                    if(count($berichten)){
                    foreach($berichten as $bericht){
                    print "<div><article>";
                        print "<h3>Bericht ".$bericht['id']."</h3>";
                        print "<p>".$bericht['naam']."</p>";
                        print "<p>".$bericht['email']."</p>";
                        print "<p>".$bericht['onderwerp']."</p>";
                        print "<p>".$bericht['bericht']."</p>";
                        print "<p><a href='database/DeleteMessage.php?id=" .$bericht['id']."'>Verwijderen</a></p>";
                    print "</article></div>";
                        }
                    } else {
                        print "<p>Er zijn geen berichten ingezonden.</p>";
                    }
                ?>
            </div>
        </article>
    </div>
<?php include_once 'shared/Footer.php'; ?>
