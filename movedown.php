<?php
$doc = new DOMDocument();
$doc->load('games.xml');

$id = $_GET["id"];
$i = 0;
$index1 = -1;
foreach ($doc->getElementsByTagName('game') as $game) {
  if (intval($game->getAttribute("id")) == intval($id)) {
    $index1 = $i;
  }
  $i++;
}
if ($index1 != -1 && $index1 < count($doc->getElementsByTagName('game')) - 1) {
  $index2 = $index1 + 1;
  echo ($index1 . " " . $index2);
  $row1 = $doc->getElementsByTagName("game")->item($index1);
  $row2 = $doc->getElementsByTagName("game")->item($index2);
  $cl1 = $row1->cloneNode(false);
  $cl2 = $row2->cloneNode(false);
  $row1->parentNode->replaceChild($cl2, $row1);
  $row2->parentNode->replaceChild($cl1, $row2);
  $doc->save("games.xml");
}

header("Location: index.php");
die();
