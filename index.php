<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
$parking = ($_GET["thereIsParking"]) ?? " ";
var_dump($parking);
var_dump($hotels);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Hotels</title>
</head>

<body>
    <form action="index.php" method="get">
        <label for="thereIsParking"></label>
        <input type="text" id="thereIsParking" name="thereIsParking">
        <button type="submit">Cerca</button>
    </form>

    <table class="table table-striped table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">Hotel</th>
                <th scope="col">Description</th>
                <th scope="col">Distance to center</th>
                <th scope="col">Parking</th>
                <th scope="col">Vote</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($hotels); $i++) {
                $array = $hotels[$i]; ?>
                <tr>
                    <td><?php echo $array['name'] ?></td>
                    <td><?php echo $array["description"] ?></td>
                    <td><?php echo $array["distance_to_center"] ?></td>
                    <td><?php if ($array["parking"] === true) {
                            echo "Avaible";
                        } else {
                            echo "Not avaible";
                        } ?>
                    </td>
                    <td><?php echo $array["vote"] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <ul>
        <?php for ($i = 0; $i < count($hotels); $i++) {
            $array = $hotels[$i];
        ?>
            <li><?php echo "{$array['name']} {$array["description"]} {$array["distance_to_center"]} "; ?></li>
        <?php } ?>
    </ul>
</body>

</html>