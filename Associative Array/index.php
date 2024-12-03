<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Associative Array</title>
</head>
<body>
    <h1>Associative Array</h1>

    <?php
        $cars = [
                    [
                        'name' => 'Toyota GLI',
                        'model' => '2022',
                        'condition' => '9/10',
                        'purchaseUrl' => 'http://example.com'
                    ],
                    [
                        'name' => 'Hundai Tucson',
                        'model' => '2019',
                        'condition' => '7/10',
                        'purchaseUrl' => 'http://example.com'
                    ],
                    [
                        'name' => 'Honda Acord',
                        'model' => '2012',
                        'condition' => '8/10',
                        'purchaseUrl' => 'http://example.com'
                    ]
        ];
    ?>

    <ul>
        <?php foreach ($cars as $car) : ?>
        <a href="#">
            <li><?=$car['name']?></li>
            </a>
        <?php endforeach; ?>
    </ul>
</body>
</html>