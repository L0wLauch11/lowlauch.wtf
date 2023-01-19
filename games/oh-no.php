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

    <title>🎮 oh no!</title>
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
        <h1><a href="https://play.google.com/store/apps/details?id=me.lowlauch.ohno">oh no!<img
                    src="/img/fancy-link.svg" class="fancy-link-icon dark-invert"></a> (2018)</h1>

        <div class="description-box">
            <p>
            <h3>Über „oh no!“:</h3>
            oh no! ist ein Spiel, welches ich 2018 erstellt habe. Das Spielprinzip ist eigentlich recht simpel. Man
            spielt einen Kreis und muss den Stacheln ausweichen. Weiters kann man Münzen einsammeln mit welchen man sich
            im Shop Designs kaufen kann.
            <br><br>
            Die erste Version des Spiels war nach ~3 Tagen Entwicklung fertig. Für das war das Projekt eigentlich
            relativ erfolgreich. 500+ Downloads im Play-Store ist schon eine ordentliche Zahl.
            <br><br>
            Nur verfügbar auf Android.
            </p>
        </div>

        <h2>Screenshots</h2>

        <div class="screenshot-box">
            <?php
            // Show all screenshots in a folder
            $directory = "/img/screenshots-oh-no";

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
        <h3><a href="https://play.google.com/store/apps/details?id=me.lowlauch.ohno" class="button">Google Play
                Store<img
                    src="/img/fancy-link.svg" class="fancy-link-icon" style="filter: invert(1);"></a></h3>
    </div>
</body>

</html>