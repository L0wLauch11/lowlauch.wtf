<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $root = $_SERVER["DOCUMENT_ROOT"];

    include "$root/head-data-extra.html";

    // init game page
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

    function get_site_meta($metadata_name)
    {
        global $metadata;
        return $metadata[$metadata_name];
    }

    ?>

    <link rel="stylesheet" href="style/image-viewer.css">
    <script src="js/image-viewer.js" defer></script>

    <title>🎮
        <?= get_site_meta('name'); ?>
    </title>
</head>

<body>
    <div class="container">
        <h1><a href=<?= get_site_meta('link'); ?> target="_blank"><?= get_site_meta('name'); ?><img src="/img/fancy-link.svg"
                    class="fancy-link-icon invert"></a> (<?= get_site_meta('year'); ?>)
        </h1>

        <div class="description-box accent-border">
            <p>
            <h3>Über „<?= get_site_meta('name'); ?>“:
            </h3>
            <?= $description; ?>
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

            // show all screenshots in a folder
            $directory = "$root/$folder/" . $codename;
            $screenshots_dir = "$directory/screenshots";

            if (is_dir_empty($screenshots_dir)) {
                return;
            }

            echo '<h2>Screenshots</h2>';

            $files = array();
            foreach (scandir("$screenshots_dir") as $file) {
                $file_name = basename("$screenshots_dir/$file");
                $image_source = "$folder/" . $codename . "/screenshots/$file_name";

                if ($file !== '.' && $file !== '..') {
                    echo "<img onclick='changeViewerImage(\"$image_source\")' class='img-clickable accent-border' src='$image_source'>";
                }
            }
            ?>
        </div>

        <?php
        if (get_site_meta('direct_download') == "")
            return;
        
        $direct_download = get_site_meta('direct_download');
        $direct_download_button_text = get_site_meta('direct_download_button_text');

        echo '<h2>Herunterladen!</h2>';
        echo "<h3><a href='$direct_download' class='button'>
            $direct_download_button_text<img src='/img/fancy-link.svg' class='fancy-link-icon'
            style='filter: invert(1);'>
            </a></h3>";
        
        // include "image-viewer.html"; does not work yet
        ?>
    </div>
</body>

</html>