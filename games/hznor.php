<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $root = $_SERVER["DOCUMENT_ROOT"];
    include "$root/head-data-extra.html";
    ?>

    <title>🎮 HZNOR</title>
</head>
<!-- „“ -->

<body>
    <header>
        <?php
        include "$root/navigation.html";
        ?>
    </header>

    <div class="container">
        <?php
        include "$root/games-hamburger-navigation.html";
        ?>

        <h1><a href="https://lowlauch.itch.io/hznor">HZNOR<img src="/img/fancy-link.svg"
                    class="fancy-link-icon dark-invert"></a> (2022)</h1>

        <div class="description-box">
            <p>
            <h3>Über „HZNOR“:</h3>
            In „HZNOR“ spielt man einen Panzer, welchen man mit Blöcken, die man in das Level platzieren kann, steuert. Die Level sind Puzzle-mäßig aufgebaut und man muss mit den Blöcken den Panzer weg von den Stacheln und somit ins Ziel lenken.
            <br><br>
            Dieses Spiel habe ich wieder für einen Game-Jam entworfen. Der Zeitdruck scheint mir immer zu helfen, gute Spiele rauszubringen XD. Obwohl Paul das Spiel nicht cool fand. Trotzdem hat er wieder die Musik gemacht :).
            <br><br>
            Verfügbar für Windows und alle modernen Browser.
            </p>
        </div>

        <h2>Screenshots</h2>

        <div class="screenshot-box">
            <?php
            // Show all screenshots in a folder
            $directory = "/img/screenshots-hznor";

            $files = array();
            foreach (scandir("$root/$directory") as $file) {
                $fileName = basename("$directory/$file");

                if ($file !== '.' && $file !== '..') {
                    echo "<img src='$directory/$fileName'>";
                }
            }
            ?>
        </div>

        <h2>Herunterladen!</h2>
        <h3><a href="https://archive.lowlauch.wtf/?file=HZNOR-win64.zip" class="button">Direkter Link<img
                    src="/img/fancy-link.svg" class="fancy-link-icon" style="filter: invert(1);"></a></h3>
    </div>
</body>

</html>