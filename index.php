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
      <a href="/">Pozycje</a>
      <a href="viewGames.php">Podgląd</a>
      <a href="exportSpreadsheet.php">Pobierz Arkusz</a>
    </div>
    <table>
      <thead>
        <td>Nazwa</td>
        <td>Miniaturka</td>
        <td>Autor</td>
        <td>Magazyn</td>
        <td>Akcje</td>
        <td>Ustawienie</td>
      </thead>
      <?php
      $doc = new DOMDocument();
      $doc->load("games.xml");

      $games = $doc->getElementsByTagName('game');
      for ($i = 0; $i < $games->length; $i++) {
        $game = $games->item($i);
        if ($_GET["id"] == $game->getAttribute("id")) {
          echo '<tr>
          <form action="editGame.php" method="get">
          <input type="hidden" name="id" value="' . $game->getAttribute("id") . '">
          
          <td><input type="text" name="name" value="' . $game->getAttribute("name") . '"></td>
          <td><input type="text" name="img" value="' . $game->getAttribute("img") . '"></td>
          <td><input type="text" name="author" value="' . $game->getAttribute("author") . '"></td>
          <td><input type="text" name="magazine" value="' . $game->getAttribute("magazine") . '"></td>
          <td class="actions"><input type="submit" value="Zatwierdź"></td>
        </form>
      </tr>';
        } else {
          echo "<tr>";
          echo "<td>" . htmlspecialchars($game->getAttribute('name')) . "</td>";
          echo "<td>" . htmlspecialchars($game->getAttribute('img')) . "</td>";
          echo "<td>" . htmlspecialchars($game->getAttribute('author')) . "</td>";
          echo "<td>" . $game->getAttribute('magazine') . "</td>";
          echo ("
          <td class='actions'>
            <form method='get'>
              <input type='hidden' name='id' value='" . $game->getAttribute("id") . "'>
              <input type='submit' value='Edytuj' formaction='index.php'>
              <input type='submit' value='Usuń' formaction='deleteGame.php'>
            </form>
          </td>");
          echo ("
          <td class='moving'>
            <form method='get'>
              <input type='hidden' name='id' value='" . $game->getAttribute("id") . "'>
              <input type='submit' value='^' formaction='moveup.php'>
              <input type='submit' value='v' formaction='movedown.php'>
            </form>
          </td> </tr>");
        }
      }
      ?>
      <tr>
        <form action="addGame.php" method="get">
          <td><input type="text" name="name"></td>
          <td><input type="text" name="img"></td>
          <td><input type="text" name="author"></td>
          <td><input type="text" name="magazine"></td>
          <td class='actions'><input type="submit" value="Dodaj"></td>
        </form>
      </tr>
    </table>
  </div>
</body>

</html>