<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Dit is het eindwerk van Geert Put en Michiel Peters voor HTML, CSS, PHP en Photoshop">
    <meta name="keywords" content="HTML, CSS, PHP, Photoshop, Eindwerk">
    <meta name="author" content="Geert Put, Michiel Peters">
    <title>Eindwerk Geert Michiel</title>
    <!--styles-->
    <link rel="stylesheet" href="../css/lightbox.css">
    <link href="../css/style.css" rel="stylesheet" />
    <!--scripts-->
	<!-- [if lt IE 9]> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js
    "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv-printshiv.min.js"></script>
    <! [endif] -->
</head>
<body>
    <div id="siteContainer">
        <!--site header-->
        <div class="fullWidthBGColor"></div>
        <header>
            <a href="home.php"><img src="../images/logo-eindwerkGeertMichiel2.png" alt="logo" /></a>
            <div>
                <nav>
                    <ul>
                        <li><a href="home.php" <?php if( $activeNav == 1){print "class='activeNav'";} ?> >Home</a></li>
                        <li><a href="menu.php" <?php if( $activeNav == 2){print "class='activeNav'";} ?> >Menu</a></li>
                        <li><a href="fotos.php" <?php if( $activeNav == 3){print "class='activeNav'";} ?> >Foto's</a></li>
                        <li><a href="contact.php" <?php if( $activeNav == 4){print "class='activeNav'";} ?> >Contact</a></li>
                    </ul>
                </nav>
                <h1><?php print $pageTitle ?></h1>
            </div>

        </header>