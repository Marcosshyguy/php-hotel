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

// creare una variabile in cui noi faremo tutti i nostri filtri che equivarrà all'array con i dati
$array_hotels_to_filter = $hotels;

// prendo il valore che dal form che mi serve e faccio null coaleshing
$parking = ($_GET["thereIsParking"]) ?? " ";
$vote = ($_GET["vote"]) ?? " ";
// se il valore non con get non è vuoto allora visualizzare visualizzare il valore filtrato
if (!empty($parking)) {
    // creerò un array d'appoggio vuoto per fare icalcoli emettere gli hotel filtrati
    $array_appoggio = [];
    // for each che analizza l'array di dati copiato  analizzando se c'e parcheggio o meno ovvero se è uguale a true
    foreach ($array_hotels_to_filter as $element) {
        // se ogni singolo array ciclato alla posizione parking possiede un valore o cmq è true allora filtra e puscia nel piccolo arry di appoggio
        if ($element["parking"]) {
            // in questo modo ad ogni interazione del ciclo controlla che ci sia parcheggio e puscia l'intero array dove è presente dentro larray d'appoggio
            $array_appoggio[] = $element;
        }
    }
    // finitoil calcolo facciamo equivalere l'array copiato con l'array usato per raggruppare i filtrati in modo che in automatico ce lo stampi
    $array_hotels_to_filter = $array_appoggio;
}


// calcolo voto minimo e superiore

// stesso procedimenti di prima 
if (!empty($vote)) {
    // cnversione in intero anche se lo fa in automatico nella condizione
    $vote = intval($vote);

    $array_appoggio = [];
    // cicliamo con for each per prendere larray con l'elemeto prestabilito
    foreach ($array_hotels_to_filter as $element) {
        // se per ogni array alla posizione vote lelemento è maggiore uguale al voto scelto allolra pusha dentro l array di appoggio
        if ($element["vote"] >= $vote) {
            $array_appoggio[] = $element;
        }
    }
    // infine salviamo larray copia come array filtrato
    $array_hotels_to_filter = $array_appoggio;
}

// la combinazione dei due due filtri o lutilizzo di uno soltanto in questo modo modificheranno larray copia
// praticamente il primo filtro quando selezionato magari lascerà 3 elemeti dentro lappoggio e dopodiche anche con il secondo filtro attivo
// andremo a filtrare gli atri 3 elemti rimasti e li slaveremo nell'array finale
// tutto questo ovviamente funzionerà grazie alla click del form ch evaluterà che valori sono stati presi
// anche perche i valori nei select filtrati non si salvano
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
        <label for="thereIsParking">Parking</label>
        <select name="thereIsParking" id="thereIsParking">
            <option value="">Tutti</option>
            <option value="esiste">Avaible</option>
        </select>
        <label for="vote"></label>
        <select name="vote" id="vote">
            <option value="">Tutti</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="3">4</option>
            <option value="5">5</option>
        </select>
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
            <!-- usato array d'appoggio con tutti i dati originali dentro $array_hotels_to_filter-->
            <?php for ($i = 0; $i < count($array_hotels_to_filter); $i++) {
                $hotel = $array_hotels_to_filter[$i]; ?>
                <tr>
                    <td><?php echo $hotel['name'] ?></td>
                    <td><?php echo $hotel["description"] ?></td>
                    <td><?php echo $hotel["distance_to_center"] . 'km' ?></td>
                    <td><?php if ($hotel["parking"] === true) {
                            echo "Avaible";
                        } else {
                            echo "Not avaible";
                        } ?>
                    </td>
                    <td><?php echo $hotel["vote"] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- metodo con ul per testare -->
    <ul>
        <?php for ($i = 0; $i < count($hotels); $i++) {
            $array = $hotels[$i];
        ?>
            <li><?php echo "{$array['name']} {$array["description"]} {$array["distance_to_center"]} "; ?></li>
        <?php } ?>
    </ul>

    <!-- <?php
            $default_container = [];
            for ($i = 0; $i < count($hotels); $i++) {
                $arrays = $hotels[$i];
                foreach ($arrays as $key => $value) {
                    if ($value === "Hotel Belvedere") {
                        echo "000";
                    } else {
                        echo $value;
                    }
                    echo "<br />";
                }
            } ?> -->
</body>

</html>