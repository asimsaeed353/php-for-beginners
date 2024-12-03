<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Arrays</title>
</head>
<body>

    <h1>PHP Arrays</h1>

    <?php
        $cars = [
                "BMW",
                "Ferrari",
                "Maserati"
        ];
    ?>

    <ul>
        <?php foreach ($cars as $car)
            echo "<li>" . $car . "</li>";
        ?>
        <br>

        <h3>Using Inline</h3>
        <?php foreach ($cars as $car)
            echo "<li>$car</li>";
        ?>
        <br>

        <h3>Using '{ }'</h3>
        <?php foreach ($cars as $car){
            echo "<li>{$car}™</li>";
        }
        ?>

    </ul>

    <h2>Using different syntax</h2>

    <ul>
        <?php foreach ($cars as $car) : ?>
        <!-- add any html in foreach loop -->
        <?php echo "this html is added in foreach loop<br>"; ?>
        <?php endforeach; ?>
    </ul>
</body>