<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        *{
            font-size: 1.25rem;
        }
    </style>
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
                        'dealer' => 'Metro Motors',
                        'purchaseUrl' => 'http://example.com'
                    ],
                    [
                        'name' => 'Hundai Tucson',
                        'model' => '2019',
                        'condition' => '7/10',
                        'dealer' => 'Sethi Motors',
                        'purchaseUrl' => 'http://example.com'
                    ],
                    [
                        'name' => 'Honda Accord',
                        'model' => '2012',
                        'condition' => '8/10',
                        'dealer' => 'Sethi Motors',
                        'purchaseUrl' => 'http://example.com'
                    ],
                    [
                            'name' => 'Suzuki Wagnor',
                            'model' => '2022',
                            'condition' => '2024',
                            'dealer' => 'Hafiz Sajjad Motors',
                            'purchaseUrl' => 'https://example.com'
                    ]
        ];

        // php functions
    function filterByDealer($cars, $dealer)
    {
        // Array to store cars
        $filteredArray = [];

        foreach ($cars as $car){
            // User conditional
            if($car['dealer'] === $dealer){
                $filteredArray[] = $car;
            }
        }

        return $filteredArray;
    }
    ?>

<!--    <ul>-->
<!--        --><?php //foreach (filterByDealer($cars, 'Metro Motors') as $car) : ?>
<!--        <a href="--><?php //=$car['purchaseUrl']?><!--">-->
<!--            <li>--><?php //=$car['name']?><!--</li>-->
<!--            </a>-->
<!--        --><?php //endforeach; ?>
<!--    </ul>-->

    <ul>

            <?php foreach (filterByDealer($cars, "Sethi Motors") as $car) : ?>

                <a href=" <?= $car['purchaseUrl'] ?> ">
                <li>
                    <?= $car['name']; ?> (<?= $car['condition'] ?>) - By <?= $car['dealer'] ?>
                </li>

                </a>
            <?php endforeach; ?>
    </ul>
</body>
</html>