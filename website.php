<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $root = $_SERVER["DOCUMENT_ROOT"];

    include "$root/head-data-extra.html";

    // Init website page
    if (!isset($_GET['name']))
        return;

    $websiteCodename = $_GET['name'];
    $websiteDirectory = "$root/websites/" . $websiteCodename;
    if (!is_dir($websiteDirectory)) {
        $websiteCodename = "archive.lowlauch.wtf"; // The folder archive.lowlauch.wtf has to exist
        $websiteDirectory = "$root/websites/" . $websiteCodename;
    }

    $websiteMetadata = parse_ini_file("$websiteDirectory/metadata.ini");
    $websiteDescription = file_get_contents("$websiteDirectory/description.html");

    function websiteMeta($metadataName)
    {
        global $websiteMetadata;
        print $websiteMetadata[$metadataName];
    }

    ?>

    <link rel="stylesheet" href="style/image-viewer.css">
    <script src="js/image-viewer.js" defer></script>

    <title>🎮
        <?php websiteMeta('website_name'); ?>
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

        <?php include "$root/websites-hamburger-navigation.php"; ?>

        <h1><a href=<?php websiteMeta('website_link'); ?>><?php websiteMeta('website_name'); ?><img src="/img/fancy-link.svg"
                    class="fancy-link-icon dark-invert"></a> (<?php websiteMeta('website_year'); ?>)
        </h1>

        <div class="description-box">
            <p>
            <h3>Über „<?php websiteMeta('website_name'); ?>“:
            </h3>
            <?php print $websiteDescription; ?>
            </p>
        </div>

        <div class="screenshot-box">
            
            <?php
            /*
            // Show all screenshots in a folder
            $directory = "$websiteDirectory/screenshots";


            foreach (scandir("$directory") as $file) {
                $fileName = basename("$directory/$file");
                $imageSource = "websites/" . $websiteCodename . "/screenshots/$fileName";

                if ($file !== '.' && $file !== '..') {
                    print "<img class='img-clickable' src='$imageSource'>";
                }
            }
            */
            ?>
            
        </div>
    </div>
</body>

</html>