<?php
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="gry.xlsx"');
header('Cache-Control: max-age=0');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

$spreadsheet = new Spreadsheet();

$doc = new DOMDocument();
$doc->load("games.xml");
$sheet = $spreadsheet->getActiveSheet();
$games = $doc->getElementsByTagName('game');

$sheet->setCellValue('A1', "nazwa");
$sheet->setCellValue('B1', "obrazek");
$sheet->setCellValue('C1', "autor");
$sheet->setCellValue('D1', "magazyn");
for ($i = 0; $i < $games->length; $i++) {
  $game = $games->item($i);
  $sheet->setCellValue('A' . ($i + 2), $game->getAttribute("name"));
  $sheet->setCellValue('B' . ($i + 2), $game->getAttribute("img"));
  $sheet->setCellValue('C' . ($i + 2), $game->getAttribute("author"));
  $sheet->setCellValue('D' . ($i + 2), $game->getAttribute("magazine"));

  $drawing = new Drawing();
  $drawing->setName('Gfx');

  $drawing->setPath('./images/' . $game->getAttribute("img"));

  $drawing->setHeight(200); // ewentualna wielkość

  $comment = $sheet->getComment('A' . ($i + 2));
  $comment->setBackgroundImage($drawing);
  $comment->setSizeAsBackgroundImage(); //jeśli chcemy komentarz wielkości obrazka
}

$writer = new Xlsx($spreadsheet);

$writer->save('php://output');

header("Location: http://localhost:8080/");
die();
