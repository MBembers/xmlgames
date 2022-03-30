<?php

$doc = new DOMDocument();
$doc->load('games.xml');

$id = $_GET["id"];
$name = $_GET["name"];
$img = $_GET["img"];
$author = $_GET["author"];
$magazine = $_GET["magazine"];

foreach ($doc->getElementsByTagName('game') as $game) {
  if (intval($game->getAttribute("id")) == intval($id)) {
    $game->setAttribute("name", $name);
    $game->setAttribute("img", $img);
    $game->setAttribute("author", $author);
    $game->setAttribute("magazine", $magazine);
  }
}

$doc->save("games.xml");
header("Location: index.php");
die();
