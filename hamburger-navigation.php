<link rel="stylesheet" href="/style/hamburger-navigation.css">
<div class="hamburger-menu">
    <?php
    $folderToUpper = ucwords($folder);

    echo "<button class='collapsible hamburger-menu-button' onclick='openHamburger()'><img src='/img/hamburger.svg'
            class='dark-invert'>
            <p>Meine $folderToUpper</p>
            </button>";
    ?>

    <div class="dropdown-content">

        <?php
        $root = $_SERVER["DOCUMENT_ROOT"];

        $directories = glob("$root/$folder/*", GLOB_ONLYDIR);
        $entries = array();
        $years_order = array();

        foreach ($directories as $directory) {
            $directory_name = basename($directory);

            $meta = parse_ini_file("$directory/metadata.ini");
            $name = $meta['name'];
            $year = $meta['year']; // used for sorting
        
            $entry = "<h3><a href='/site?type=$folder&name=$directory_name'>$name<img src='/img/fancy-link.svg' class='fancy-link-icon dark-invert'></a></h3>";

            $ind = "$year";
            error_reporting(E_ERROR | E_PARSE);
            while ($entries["$ind"] != "") {
                $ind .= "+";
            }
            $entries[$ind] = $entry;
            

            array_push($years_order, $year);
        }

        sort($years_order, SORT_NUMERIC);
        $sorted_entries = array_replace(array_flip($years_order), $entries);

        foreach($sorted_entries as $item) {
            print $item;
        }
        ?>

        <div style="padding-bottom: 4px;"></div>
    </div>
</div>

<script src="/js/hamburger.js" defer></script>