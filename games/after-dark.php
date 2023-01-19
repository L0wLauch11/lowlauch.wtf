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

    <title>🎮 After Dark</title>
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
        <h1><a href="https://lowlauch.itch.io/after-dark">After Dark<img src="/img/fancy-link.svg"
                    class="fancy-link-icon dark-invert"></a> (2021)</h1>

        <div class="description-box">
            <p>
            <h3>Über „After Dark“:</h3>
            „After Dark“ ist ein 2D Jump and Run. Immer wenn man stirbt, wird eine Lichtquelle auf der Todesposition in der Dunkelheit erschaffen und so muss man sich langsam mit seinem Charakter durch die Level vorantasten.
            <br><br>
            Das zweite Spiel was je ich für einen Game-Jam gemacht habe. (Wir reden nicht über „ <a target="_blank" href="https://lowlauch.itch.io/lucky-diggah">Lucky diggah<img src="/img/fancy-link.svg"
                    class="fancy-link-icon dark-invert"></a>“). Musik mal wieder von meinem Freund Paul.
            <br><br>
            Für Windows (und Browser!) verfügbar.
            </p>
        </div>

        <h2>Screenshots</h2>

        <div class="screenshot-box">
            <?php
            // Show all screenshots in a folder
            $directory = "/img/screenshots-after-dark";

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
        <h3><a href="https://archive.lowlauch.wtf/?file=After%20Dark%20Windows.zip" class="button">Direkter Link<img
                    src="/img/fancy-link.svg" class="fancy-link-icon" style="filter: invert(1);"></a></h3>
    </div>
</body>

</html>