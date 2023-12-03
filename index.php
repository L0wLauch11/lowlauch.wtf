<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $root = $_SERVER["DOCUMENT_ROOT"];
    include "$root/head-data-extra.html";
    ?>

    <title>lowlauch</title>
</head>
<body>
    <?php
    $games_dir = "$root/games/*";
    $websites_dir = "$root/websites/*";

    function generate_singular_window($name, $link) {
        print <<<HTML
        <div style='top: 200px; left: 30%;' class='window invisible' id='window-$name'>
            <div class='window-titlebar'>
                <p><span>$name</span> <button onclick='hide(this)' class='window-close'>X</button></p>
            </div>

            <iframe width='700px' height='500px' src='$link'></iframe>
        </div>
        HTML;
    }

    function generate_windows($dir, $type) {
        $sites = glob($dir, GLOB_ONLYDIR);

        // Generate windows
        foreach ($sites as $site) {
            $name = basename($site);
            print <<<HTML
            <div style='top: 200px; left: 30%;' class='window invisible' id='window-$name'>
                <div class='window-titlebar'>
                    <p><span>$name</span> <button onclick='hide(this)' class='window-close'>X</button></p>
                </div>

                <iframe width='700px' height='500px' src='/site?type=$type&name=$name'></iframe>
            </div>
            HTML;
        }
    }

    generate_windows($games_dir, 'games');
    generate_windows($websites_dir, 'websites');

    generate_singular_window('socials', '/socials');
    generate_singular_window('testing', '/testing');
    ?>

    <header>
        <div class='window' style='top: 16px; left: 16px'>
            <div class='window-titlebar'>
                <p><span>Navigation</span></p>
            </div>

            <nav>
                <ul>
                    <?php
                    function generate_singular_navigation($name) {
                        print <<<HTML
                        <li><button class='button nav-button-additions' onclick='showWindow("window-$name")'>$name</button></li>
                        HTML;
                    }

                    function generate_navigation_for_windows($dir, $headline) {
                        $sites = glob($dir, GLOB_ONLYDIR);

                        print "<p style='margin-top: 0px; font-weight: bold;'>$headline</p>";

                        foreach ($sites as $site) {
                            $name = basename($site);

                            print <<<HTML
                            <li><button class='button nav-button-additions' onclick='showWindow("window-$name")'>$name</button></li>
                            HTML;
                        }

                        print '<hr>';
                    }

                    generate_navigation_for_windows($games_dir, 'Spiele');
                    generate_navigation_for_windows($websites_dir, 'Webseiten');

                    ?>

                    <p style='margin-top: 0px; font-weight: bold;'>Anderes</p>

                    <?php
                    generate_singular_navigation('socials');
                    generate_singular_navigation('testing');
                    ?>

                    <li>
                        <button class='button nav-button-additions'><a style='text-decoration: none;' target="_blank" href="https://github.com/L0wLauch11/lowlauch.wtf">source code</a></button>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>