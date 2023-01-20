<link rel="stylesheet" href="/style/hamburger-navigation.css">
<div class="hamburger-menu">
    <button class="collapsible hamburger-menu-button" onclick="openHamburger()"><img src="/img/hamburger.svg"
            class="dark-invert">
        <p>Meine Spiele</p>
    </button>
    <div class="dropdown-content">

        <?php
        $root = $_SERVER["DOCUMENT_ROOT"];

        $directories = glob("$root/games/*", GLOB_ONLYDIR);
        $gameEntries = array();
        $gameYearsOrder = array();

        foreach ($directories as $directory) {
            $directoryName = basename($directory);

            $gameMeta = parse_ini_file("$directory/metadata.ini");
            $gameName = $gameMeta['game_name'];
            $gameYear = $gameMeta['game_year']; // used for sorting
        
            $entry = "<h3><a href='/game?name=$directoryName'>$gameName<img src='/img/fancy-link.svg' class='fancy-link-icon dark-invert'></a></h3>";

            $gameEntries["$gameYear"] = $entry;
            array_push($gameYearsOrder, $gameYear);
        }

        sort($gameYearsOrder, SORT_NUMERIC);
        $sortedEntries = array_replace(array_flip($gameYearsOrder), $gameEntries);

        foreach($sortedEntries as $item) {
            print $item;
        }
        ?>

        <div style="padding-bottom: 4px;"></div>
    </div>
</div>

<script src="/js/hamburger.js" defer></script>