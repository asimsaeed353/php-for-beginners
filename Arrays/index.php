<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP Arrays</title>
</head>
<body>

    <h1>This is PHP Array Tutorial</h1>

    <?php
        $books = [
                "Alchemist",
                "Atomic Habits",
                "Baby's day out"
        ];
    ?>

    <ul>
        <?php
            foreach ($books as $book){
                echo "<li>{$book}®</li>";
            }
        ?>
    </ul>

    <ul>
        <?php foreach ($books as $book) : ?>
        <li><?= $book ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>