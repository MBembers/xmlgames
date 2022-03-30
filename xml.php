<pre>
<?php
// header("content-type: text/xml");  
$doc = new DOMDocument();
$doc->load('games.xml');


$tag = $doc->getElementsByTagName("game")->item(0);
echo $tag->getAttribute("name") . " " . $tag->getAttribute("magazine");
//pobieranie wartości węzła
//echo $doc->getElementsByTagName("w")->item(1)->nodeValue;

//pobieranie wartości atrybutu
//$tag= $doc->getElementsByTagName("w")->item(0);
//echo $tag->getAttribute("plec")." ".$tag->getAttribute("lat");

//tworzenie węzła
// $co = $doc->createElement("w", "Ola");
// $gdzie = $doc->getElementsByTagName("root")->item(0);
// $gdzie->appendChild($co);

//tworzenie atrybutu
// $co = $doc->createTextNode("M");
// $attr = $doc->createAttribute("plec");
// $attr->appendChild($co);
// $gdzie = $doc->getElementsByTagName("w")->item(3);
// $gdzie->appendChild($attr);

//usuwanie węzła
// $co = $doc->getElementsByTagName("w")->item(2);
// $skad = $doc->getElementsByTagName("root")->item(0);
// $skad->removeChild($co);

//zamiana węzła
// echo ($doc->getElementsByTagName("w")->length);
// $co = $doc->getElementsByTagName("w")->item(3);
// $jakis = $doc->createElement("w", "TESCIOR");
// $skad = $doc->getElementsByTagName("w")->item(1);
// $co = $skad->childNodes->item(0);
// $skad->removeChild($co);
// print_r($co);

// $co->parentNode->replaceChild($jakis, $co);

// echo $doc->saveXML();
$doc->save("testNNN.xml");
