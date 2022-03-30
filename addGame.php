<?php

$doc = new DOMDocument();
$doc->load('games.xml');

$name = $_GET["name"];
$img = $_GET["img"];
$author = $_GET["author"];
$magazine = $_GET["magazine"];


$newGameTag = $doc->createElement("game");

$games = $doc->getElementsByTagName('game');
$gamesnum = $games->length;
$lastId = intval($games->item($gamesnum - 1)->getAttribute("id"));

$attr = $doc->createAttribute("id");
$textNode = $doc->createTextNode($lastId + 1);
$attr->appendChild($textNode);
$newGameTag->appendChild($attr);

$attr = $doc->createAttribute("name");
$textNode = $doc->createTextNode($name);
$attr->appendChild($textNode);
$newGameTag->appendChild($attr);

$attr = $doc->createAttribute("img");
$textNode = $doc->createTextNode($img);
$attr->appendChild($textNode);
$newGameTag->appendChild($attr);

$attr = $doc->createAttribute("author");
$textNode = $doc->createTextNode($author);
$attr->appendChild($textNode);
$newGameTag->appendChild($attr);

$attr = $doc->createAttribute("magazine");
$textNode = $doc->createTextNode($magazine);
$attr->appendChild($textNode);
$newGameTag->appendChild($attr);

$root = $doc->getElementsByTagName('games')->item(0);
$root->appendChild($newGameTag);
$doc->save("games.xml");
header("Location: index.php");
die();
