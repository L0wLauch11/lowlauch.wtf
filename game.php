<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $root = $_SERVER["DOCUMENT_ROOT"];

    include "$root/head-data-extra.html";

    // Init game page
    if (!isset($_GET['name']))
        return;

    $gameCodename = $_GET['name'];
    $gameDirectory = "$root/games/" . $gameCodename;
    if (!is_dir($gameDirectory)) {
        $gameCodename = "oh-no"; // The folder oh-no to exist
        $gameDirectory = "$root/games/" . $gameCodename;
    }

    $gameMetadata = parse_ini_file("$gameDirectory/metadata.ini");
    $gameDescription = file_get_contents("$gameDirectory/description.html");

    function gameMeta($metadataName)
    {
        global $gameMetadata;
        print $gameMetadata[$metadataName];
    }

    ?>

    <link rel="stylesheet" href="style/image-viewer.css">
    <script src="js/image-viewer.js" defer></script>

    <title>🎮
        <?php gameMeta('game_name'); ?>
    </title>
</head>

<body>
    <header>
        <?php include "$root/navigation.html"; ?>
    </header>

    <div class="container">

        <div id="myModal" class="modal">
            <span class="close">&times;</span>
            <img class="modal-content" id="modalImg">
        </div>

        <?php include "$root/games-hamburger-navigation.php"; ?>

        <h1><a href=<?php gameMeta('game_link'); ?>><?php gameMeta('game_name'); ?><img src="/img/fancy-link.svg"
                    class="fancy-link-icon dark-invert"></a> (<?php gameMeta('game_year'); ?>)
        </h1>

        <div class="description-box">
            <p>
            <h3>Über „<?php gameMeta('game_name'); ?>“:
            </h3>
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
                $imageSource = "games/" . $gameCodename . "/screenshots/$fileName";

                if ($file !== '.' && $file !== '..') {
                    echo "<img class='img-clickable' src='$imageSource'>";
                }
            }
            ?>
        </div>

        <h2>Herunterladen!</h2>
        <h3><a href=<?php gameMeta('game_direct_download'); ?> class="button">
                <?php gameMeta('direct_download_button_text'); ?><img src="/img/fancy-link.svg" class="fancy-link-icon"
                    style="filter: invert(1);">
            </a></h3>
    </div>
</body>

</html>