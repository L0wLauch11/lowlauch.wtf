<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $root = $_SERVER["DOCUMENT_ROOT"];

    include "$root/head-data-extra.html";
    include "$root/games-hamburger-navigation.html";

    // Init game page
    if (!isset($_GET['name']))
        return;

    $gameDirectory = "$root/games/" . $_GET['name'];
    $gameMetadata = parse_ini_file("$gameDirectory/metadata.ini");
    $gameDescription = file_get_contents("$gameDirectory/description.html");

    function meta($metadataName)
    {
        global $gameMetadata;
        print $gameMetadata[$metadataName];
    }

    ?>

    <title>🎮 <?php meta('game_name'); ?></title>
</head>

<body>
    <header>
        <?php
        include "$root/navigation.html";
        ?>
    </header>

    <div class="container">
        <h1><a href=<?php meta('game_link');?>><?php meta('game_name'); ?><img
                    src="/img/fancy-link.svg" class="fancy-link-icon dark-invert"></a> (<?php meta('game_year'); ?>)</h1>

        <div class="description-box">
            <p>
            <h3>Über „<?php meta('game_name'); ?>“:</h3>
            <?php print $gameDescription; ?>
            </p>
        </div>

        <h2>Screenshots</h2>

        <div class="screenshot-box">
            <?php
            // Show all screenshots in a folder
            $directory = "$gameDirectory/screenshots";

            $files = array();
            foreach (scandir("$directory") as $file) {
                $fileName = basename("$directory/$file");

                if ($file !== '.' && $file !== '..') {
                    echo "<img src='games/" . $_GET['name'] . "/screenshots/$fileName'>";
                }
            }
            ?>
        </div>

        <h2>Herunterladen!</h2>
        <h3><a href=<?php meta('game_direct_download'); ?> class="button">
                <?php meta('direct_download_button_text'); ?><img src="/img/fancy-link.svg" class="fancy-link-icon"
                    style="filter: invert(1);">
            </a></h3>
    </div>
</body>

</html>