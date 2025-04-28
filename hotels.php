<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <?php
    // creiamo l'array bidimensionale
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
        // stampiamo l'array schermo
    ?>



<!-- creiamo il form -->
<form method = "GET">
    <label> parcheggio </label>
    <input type="radio" name = "need_parking" value=1>yes
    <input type="radio" name = "need_parking" value=0>no
    <button type="submit">invia</button>
</form>


<table class="table table-bordered table-striped">
<thead class="thead-dark">
<tr>
    <?php 
        // Otteniamo le chiavi del primo elemento dell'array ($hotels[0]) per usarle come intestazioni della tabella
        $keys = array_keys($hotels[0]);

        // Cicliamo su tutte le chiavi ottenute ricavandoci la singola chiave
        foreach($keys as $key){
            //stampiamo ogni chiave come una colonna dell'intestazione della tabella
            echo "<th>$key</th>";
        };
    ?>
</tr>
</thead>   

<!-- riga di intestazione -->
<?php

//se need parking esiste
if(isset($_GET['need_parking'])){
    // ci salviamo la richiesta del client
    $needParking = intval($_GET["need_parking"]);
}else {
    $needParking = null;
}

    // var_dump($needParking);

    // se needParking è true allora mostrare solo gli hotel che hanno il parcheggio 
    if($needParking == true ){
     $filteredHotels = array_filter($hotels, fn($hotel)=> $hotel["parking"] == 1);
        // cicliamo su l'array filtrato per ricavare gli elementi
        foreach($filteredHotels as $filteredHotel){
        // apriamo la riga della tabella
        echo "<tr>";
   
        // per ogni hotel(associativo) richiaviamoci la coppia chiave valore
        foreach ($filteredHotel as $key => $value){
            // per ogli colonna stampiamo il valore
            echo "<td>$value</td>";
        };
        // chiudiamo la riga una volta finito i valori
        echo "</tr>";
        }
    } // altrimenti mostrarli tutti
    else{

    // cicliamo su tutto l'array per ricavare gli elementi
    foreach ($hotels as $hotel){
        // apriamo la riga della tabella
        echo "<tr>";
   
        // per ogni hotel(associativo) richiaviamoci la coppia chiave valore
        foreach ($hotel as $key => $value){
            // per ogli colonna stampiamo il valore
            echo "<td>$value</td>";
        };
        // chiudiamo la riga una volta finito i valori
        echo "</tr>";
    };
    }
?>




</table>

</body>
</html>