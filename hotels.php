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
    <div class="container mt-4">
        <form method="GET" class="p-4 border rounded bg-light">
            <div class= "row">
            <div class="col form-group">
                <label class="font-weight-bold">Parcheggio</label>
                <div class="col form-check">
                    <input class="form-check-input" type="radio" name="need_parking" value="1" id="parkingYes">
                    <label class="form-check-label" for="parkingYes">Yes</label>
                </div>
                <div class="col form-check">
                    <input class="form-check-input" type="radio" name="need_parking" value="0" id="parkingNo">
                    <label class="form-check-label" for="parkingNo">No</label>
                </div>
            </div>

            <div class="col form-group">
                <label class="font-weight-bold" for="vote">Vote</label>
                <select class="form-control" name="vote" id="vote">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            </div>
            
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-dark">Invia</button>
            </div>
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

        //ricaviamoci i dati del form
        // Need Parking
        if(isset($_GET['need_parking'])){
            // ci salviamo la richiesta del client
            $needParking = intval($_GET["need_parking"]);
        }else {
            $needParking = null;
        }

        // Vote
        $vote = intval($_GET['vote']);


            // var_dump($needParking);


            // mi creo un'array di hotel filtrati da riempire
            $filteredHotels = [];

            // ciclo sugli hotel e mi ricavo il singolo elemento
            foreach($hotels as $hotel){
                // se il cliente ha scelto il parcheggio
                if($needParking != null){
                    //condizione sia sul parking che sul voto
                    if($hotel["parking"] == $needParking && $hotel["vote"] >= $vote){
                        //inseriamo l'elemento all'interno dell'array creato
                        array_push($filteredHotels, $hotel);
                    };
                    //se il cliente non ha scelto nessuna delle due
                }else{
                    //condizione sul voto
                    if($hotel["vote"] >= $vote){
                        //inseriamo l'elemento all'interno dell'array creato
                        array_push($filteredHotels, $hotel);
                    };
                };
            };

            // var_dump($filteredHotels);

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
                };
            ?>
        </table>
    </div>




</body>
</html>