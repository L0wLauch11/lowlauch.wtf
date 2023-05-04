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

    <link rel="stylesheet" href="style/socials.css">

    <title>Social Media</title>
</head>

<body>
    <header>
        <?php
        include "$root/navigation.html";
        ?>
    </header>

    <div class="container">


        <ul class="socials-card">
            <h1>Meine Sozialen Medien</h1>

            <a target="_blank" href="https://lowlauch.itch.io/">
                <li>
                    <img src="img/socials/itch.png">
                    <p><b>itch.io</b>
                        <br>Meine Spiele
                    </p>
                </li>
            </a>

            <a target="_blank" href="https://www.youtube.com/channel/UCVyIDbU_UuX2tli7_zNbVDg">
                <li>
                    <img src="img/socials/yt.png">
                    <p><b>YouTube</b>
                        <br>Random Zeugs
                    </p>
                </li>
            </a>

            <a target="_blank" href="https://twitter.com/LowLauch">
                <li>
                    <img src="img/socials/twitter.png">
                    <p><b>Twitter</b>
                        <br>Unnötig
                    </p>
                </li>
            </a>

            <a target="_blank" href="https://www.tiktok.com/@lowlauch">
                <li>
                    <img src="img/socials/tiktok.webp">
                    <p><b>TikTok</b>
                        <br>Deinstalliert
                    </p>
                </li>
            </a>

            <a target="_blank" href="https://instagram.com/lowlauch">
                <li>
                    <img src="img/socials/insta.png">
                    <p><b>Instagram</b>
                        <br>Inaktiv
                    </p>
                </li>
            </a>
        </ul>
    </div>
</body>

</html>