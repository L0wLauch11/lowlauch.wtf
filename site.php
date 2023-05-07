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

    $codename = $_GET['name'];
    $folder = $_GET['type'];

    $directory = "$root/$folder/" . $codename;
    if (!is_dir($directory)) {
        $codename = scandir("$root/$folder/")[2];
        $directory = "$root/$folder/" . $codename;
    }

    $metadata = parse_ini_file("$directory/metadata.ini");
    $description = file_get_contents("$directory/description.html");

    function siteMetaPrint($metadataName)
    {
        global $metadata;
        print $metadata[$metadataName];
        return $metadata[$metadataName];
    }

    function getSiteMeta($metadataName)
    {
        global $metadata;
        return $metadata[$metadataName];
    }

    ?>

    <link rel="stylesheet" href="style/image-viewer.css">
    <script src="js/image-viewer.js" defer></script>

    <title>🎮
        <?php siteMetaPrint('name'); ?>
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

        <?php include "$root/hamburger-navigation.php"; ?>

        <h1><a href=<?php siteMetaPrint('link'); ?>><?php siteMetaPrint('name'); ?><img src="/img/fancy-link.svg"
                    class="fancy-link-icon dark-invert"></a> (<?php siteMetaPrint('year'); ?>)
        </h1>

        <div class="description-box">
            <p>
            <h3>Über „<?php siteMetaPrint('name'); ?>“:
            </h3>
            <?php print $description; ?>
            </p>
        </div>

        <div class="screenshot-box">
            <?php
            function is_dir_empty($dir)
            {
                $handle = opendir($dir);
                while (false !== ($entry = readdir($handle))) {
                    if ($entry != "." && $entry != "..") {
                        closedir($handle);
                        return false;
                    }
                }
                closedir($handle);
                return true;
            }

            // Show all screenshots in a folder
            $directory = "$root/$folder/" . $codename;
            $screenshotsDir = "$directory/screenshots";

            if (is_dir_empty($screenshotsDir)) {
                return;
            }

            echo '<h2>Screenshots</h2>';

            $files = array();
            foreach (scandir("$screenshotsDir") as $file) {
                $fileName = basename("$screenshotsDir/$file");
                $imageSource = "$folder/" . $codename . "/screenshots/$fileName";

                if ($file !== '.' && $file !== '..') {
                    echo "<img class='img-clickable' src='$imageSource'>";
                }
            }
            ?>
        </div>

        <?php
        if (getSiteMeta('direct_download') == "")
            return;

        $direct_download = getSiteMeta('direct_download');
        $direct_download_button_text = getSiteMeta('direct_download_button_text');

        echo '<h2>Herunterladen!</h2>';
        echo "<h3><a href=$direct_download class='button'>
            $direct_download_button_text<img src='/img/fancy-link.svg' class='fancy-link-icon'
            style='filter: invert(1);'>
            </a></h3>";
        
        ?>
    </div>
</body>

</html>