<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <title>PHP Hotel</title>
</head>
<body>

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

    // foreach($hotels as $hotel) {
    //   foreach ($hotel as $key => $value) {
    //     echo $key . ': ' . $value . '<br>';
    //   }
    // }
  ?>

  <form method="GET">
  <div class="form-row">
    <div class="form-group col-md-2 my-3">
      <label for="parking">Parcheggio</label>
      <select id="parking" name="hotelParking" class="form-control">
        <option value="">Tutti</option>
        <option value="1">Con Parcheggio</option>
        <option value="2">Senza Parcheggio</option>
      </select>
    </div>
    <div class="form-group col-md-2 mb-1">
      <label for="vote">Voto</label>
      <select id="vote" name="hotelVote" class="form-control">
        <option value="">Tutti</option>
        <option value="2">2 Stelle e superiori</option>
        <option value="3">3 Stelle e superiori</option>
        <option value="4">4 Stelle e superiori</option>
        <option value="5">5 Stelle</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <button type="submit" class="btn btn-primary">Filtra</button>
    </div>
  </form>

  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Descrizione</th>
        <th scope="col">Parcheggio</th>
        <th scope="col">Voto</th>
        <th scope="col">Distanza dal centro</th>
      </tr>
    </thead>
    <tbody>

    <!-- 
    TEORIA
    crea un nuovo array contenente solo gli elementi dell'array originale per i quali la funzione di callback restituisce true.
    $filteredArray = array_filter($array, function ($element) {
      codice che verrà verificato o meno
    });

    $numbers = [2, 8, 4, 10, 3, 6];
    // Utilizza array_filter per mantenere solo i numeri maggiori di 5
    $filteredNumbers = array_filter($numbers, function ($number) {
        return $number > 5;
    });
    // $filteredNumbers conterrà solo [8, 10, 6]

    isset: verifica se una variabile è stata impostata e se il suo valore non è null (in questo caso se un valore è stato selezionato dall'utente);
    $_GET: È una superglobale in PHP che viene utilizzata per recuperare dati dalla query string dell'URL;
    -->

    <?php
      $filteredHotels = $hotels;
      
      if ($_GET['hotelParking'] === '1') {
        $filteredHotels = array_filter($filteredHotels, function ($hotel) {
            return $hotel['parking'];
        });
      } elseif ($_GET['hotelParking'] === '2') {
          $filteredHotels = array_filter($filteredHotels, function ($hotel) {
              return !$hotel['parking'];
          });
      }
    
      if ($_GET['hotelVote']) {
        $filteredHotels = array_filter($filteredHotels, function ($hotel) {
            return $hotel['vote'] >= $_GET['hotelVote'];
        });
      }

      // Display degli hotel
      foreach ($filteredHotels as $index => $hotel) {
        echo "<tr>
                <th scope='row'>" . ($index + 1) . "</th>
                <td>{$hotel['name']}</td>
                <td>{$hotel['description']}</td>
                <td>" . ($hotel['parking'] ? 'Sì' : 'No') . "</td>
                <td>{$hotel['vote']}</td>
                <td>{$hotel['distance_to_center']} km</td>
              </tr>";
      }
    ?>

    </tbody>
  </table>
  
</body>
</html>
