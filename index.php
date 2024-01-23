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

    <form>
    <div class="form-row">
      <div class="form-group col-md-2 my-3">
        <label for="parking">Parcheggio</label>
        <select id="parking" name="parking" class="form-select">
          <option value="">Tutti</option>
          <option value="1">Con Parcheggio</option>
          <option value="2">Senza Parcheggio</option>
        </select>
      </div>
      <div class="form-group col-md-2 mb-1">
        <label for="vote">Voto</label>
        <select id="vote" name="vote" class="form-select">
          <option value="">Tutti</option>
          <option value="1">2 Stelle e superiori</option>
          <option value="2">3 Stelle e superiori</option>
          <option value="3">4 Stelle e superiori</option>
          <option value="4">5 Stelle e superiori</option>
        </select>
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Filtra</button>
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

        <?php
          foreach ($hotels as $index => $hotel) {
            echo '<tr>';
              echo '<th scope="row">'. ($index + 1) .'</th>';
              echo '<td>' . $hotel["name"] . '</td>';
              echo '<td>' . $hotel["description"] . '</td>';
              echo '<td>' . ($hotel["parking"] ? 'Sì' : 'No') . '</td>';
              echo '<td>' . $hotel["vote"] . '</td>';
              echo '<td>' . $hotel["distance_to_center"] . 'km</td>';
            echo '</tr>';
          }
        ?>

      </tbody>
    </table>
  
</body>
</html>
