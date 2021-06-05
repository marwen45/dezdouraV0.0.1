<?php
    session_start();
    if (isset($_SESSION['nbreVisite'])) {
        $nbreVisite = $_SESSION['nbreVisite'];
        $nbreVisite++;
        $_SESSION['nbreVisite'] = $nbreVisite;
        $message = "Bienvenu fidèle visitreur c'est votre $nbreVisite visites";
    } else {
        $nbreVisite = 1;
        $_SESSION['nbreVisite'] = $nbreVisite;
        $message = "Bienvenu cher nouveau visitreur nous somme ravi de votre visite";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="node_modules/bootswatch/dist/darkly/bootstrap.css">
    <title>Session</title>
</head>

<body>

        <?=$message ?>

</body>

</html>