<!--variables-->
<?php
$pageTitle = "Home";
$activeNav = 1;

?>
<!--site header-->
<?php include_once "shared/Header.php" ?>
<!--site content-->
<div id="contentContainerHome">
    <article>
        <h2>Brasserie "Name to be decided"</h2>
        <p>Welkom bij het gezelligste plekje in belgie.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium adipisci at aut commodi
            consectetur culpa cumque earum, est eveniet ex excepturi fuga id illo impedit laudantium modi mollitia nam
            nisi, perferendis, perspiciatis quo repudiandae sapiente suscipit ut veniam vero? Accusantium,
            necessitatibus nulla! Dolorem ex mollitia optio repudiandae tempora tenetur!</p>
    </article>
    <article>
        <h2>Evenementen</h2>
        <p>
            Volgende evenementen staan binnenkort op het programma.
        </p>
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
    </article>
    <article>
        <h2>Over ons</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus accusantium adipisci at aut commodi
            consectetur culpa cumque earum, est eveniet ex excepturi fuga id illo impedit laudantium modi mollitia nam
            nisi, perferendis, perspiciatis quo repudiandae sapiente suscipit ut veniam vero? Accusantium,
            necessitatibus nulla! Dolorem ex mollitia optio repudiandae tempora tenetur!</p>
    </article>
</div>
<!--site footer-->
<?php include_once "shared/Footer.php" ?>


