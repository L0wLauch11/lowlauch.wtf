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

    <title>🏠 lowlauch</title>
</head>

<body>
    <header>
        <?php
        include "$root/navigation.html";
        ?>
    </header>

    <div class="container">
        <div style="text-align: center;"><h1>Christoph, wie er in der Luft sitzt.</h1></div>
        <img src="/img/home/weepa_sitzt_in_der_luft.png" alt="" srcset=""
            style="display: block; margin-left: auto; margin-right: auto; border-radius: 8px; max-width: 100%; max-height: 100%;">
    </div>

    <footer>
        <?php
        include "$root/footer.html";
        ?>
    </footer>
</body>

</html>