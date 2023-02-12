<link rel="stylesheet" href="/style/hamburger-navigation.css">
<div class="hamburger-menu">
    <button class="collapsible hamburger-menu-button" onclick="openHamburger()"><img src="/img/hamburger.svg"
            class="dark-invert">
        <p>Meine Websites</p>
    </button>
    <div class="dropdown-content">

        <?php
        $root = $_SERVER["DOCUMENT_ROOT"];

        $directories = glob("$root/websites/*", GLOB_ONLYDIR);
        $websiteEntries = array();
        $websiteYearsOrder = array();

        foreach ($directories as $directory) {
            $directoryName = basename($directory);

            $websiteMeta = parse_ini_file("$directory/metadata.ini");
            $websiteName = $websiteMeta['website_name'];
            $websiteYear = $websiteMeta['website_year']; // used for sorting
        
            $entry = "<h3><a href='/website?name=$directoryName'>$websiteName<img src='/img/fancy-link.svg' class='fancy-link-icon dark-invert'></a></h3>";

            $websiteEntries["$websiteYear"] = $entry;
            array_push($websiteYearsOrder, $websiteYear);
        }

        sort($websiteYearsOrder, SORT_NUMERIC);
        $sortedEntries = array_replace(array_flip($websiteYearsOrder), $websiteEntries);

        foreach($sortedEntries as $item) {
            print $item;
        }
        ?>

        <div style="padding-bottom: 4px;"></div>
    </div>
</div>

<script src="/js/hamburger.js" defer></script>