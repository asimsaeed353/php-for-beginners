<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conditional and Booleans</title>
</head>
<body>
    <?php
        $name = "AlChemist";
        $read = false;

        if($read){
            $message = "You have read $name";
        } else {
            $message = "You have NOT read $name.";
        }
    ?>

    <h1>
        <?php
            echo "$message";
        ?>
    </h1>
</body>
</html>
