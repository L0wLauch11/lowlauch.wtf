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

    <title>🎮 Corrupted Timelapse</title>
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

        <h1><a href="https://lowlauch.itch.io/corruptedtimelapse">Corrupted Timelapse<img src="/img/fancy-link.svg"
                    class="fancy-link-icon dark-invert"></a> (2019)</h1>

        <div class="description-box">
            <p>
            <h3>Über „Corrupted Timelapse“!:</h3>
            In diesem Spiel spielst du ein Quadrat, welches die Zeit verlangsamen kann, indem es stehen bleibt. Man muss versuchen diese Fähigkeit zu seinem Vorteil zu verwenden um die Gegner zu töten.
            <br><br>
            Mein erstes Spiel was ich für einen Game-Jam entworfen habe. Außerdem ist „Corrupted Timelapse“ eines der ersten guten Spiele die ich gemacht habe. Insgesamt sind wir mit dem Spiel 9ter Platz von 51 (?) Spielen geworden. Musik ist von meinem Freund Paul und mein Bruder hat einige Grafiken gemacht.
            <br><br>
            Verfügbar auf Windows.
            </p>
        </div>

        <h2>Screenshots</h2>

        <div class="screenshot-box">
            <?php
            // Show all screenshots in a folder
            $directory = "/img/screenshots-corrupted-timelapse";

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
        <h3><a href="https://archive.lowlauch.wtf/?file=Corrupted%20Timelapse%20Standalone.zip" class="button">Direkter
                Link<img src="/img/fancy-link.svg" class="fancy-link-icon" style="filter: invert(1);"></a></h3>
    </div>
</body>

</html>