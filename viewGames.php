<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>XML</title>
</head>

<body>
  <div class="container">
    <div class="switch">
      <a href="index.php">Pozycje</a>
      <a href="viewGames.php">Podgląd</a>
    </div>
    <table>
      <thead>
        <td>Nazwa</td>
        <td>Miniaturka</td>
        <td>Autor</td>
        <td>Magazyn</td>
      </thead>
      <?php
      $doc = new DOMDocument();
      $doc->load("games.xml");

      $games = $doc->getElementsByTagName('game');
      for ($i = 0; $i < $games->length; $i++) {
        $game = $games->item($i);

        echo "<tr>";
        echo "<td>" . htmlspecialchars($game->getAttribute('name')) . "</td>";
        echo "<td> <img src='images/" . $game->getAttribute('img') . "'> </td>";
        echo "<td>" . htmlspecialchars($game->getAttribute('author')) . "</td>";
        echo "<td>" . $game->getAttribute('magazine') . "</td>";
      }

      ?>
    </table>
  </div>
</body>

</html>