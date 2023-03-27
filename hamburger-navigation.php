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
        $yearsOrder = array();

        foreach ($directories as $directory) {
            $directoryName = basename($directory);

            $meta = parse_ini_file("$directory/metadata.ini");
            $name = $meta['name'];
            $year = $meta['year']; // used for sorting
        
            $entry = "<h3><a href='/site?type=$folder&name=$directoryName'>$name<img src='/img/fancy-link.svg' class='fancy-link-icon dark-invert'></a></h3>";

            $ind = "$year";
            while ($entries["$ind"] != "") {
                $ind .= "+";
            }
            $entries[$ind] = $entry;
            

            array_push($yearsOrder, $year);
        }

        sort($yearsOrder, SORT_NUMERIC);
        $sortedEntries = array_replace(array_flip($yearsOrder), $entries);

        foreach($sortedEntries as $item) {
            print $item;
        }
        ?>

        <div style="padding-bottom: 4px;"></div>
    </div>
</div>

<script src="/js/hamburger.js" defer></script>