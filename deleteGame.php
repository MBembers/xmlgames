<pre>
<?php
$doc = new DOMDocument();
$doc->load("games.xml");
$id = $_GET["id"];

foreach ($doc->getElementsByTagName('game') as $game) {
  if (intval($game->getAttribute("id")) == intval($id)) {
    $games = $doc->getElementsByTagName('games')->item(0);
    $games->removeChild($game);
  }
}

$doc->save('games.xml');
header("Location: index.php");
die();
