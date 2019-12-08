<?php
//Headers

$year = date('Y');


$source = "http://atvira.sodra.lt/imones/downloads/" . $year . "/monthly-" . $year . ".csv.zip";

file_put_contents('tmp.zip', file_get_contents($source));

$zip = new ZipArchive;
$res = $zip->open('tmp.zip');
if ($res === TRUE) {
    $zip->extractTo('C:\xampp\mysql\data\sodra');
    $zip->close();
} else { }


header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type');

include_once '../../config/Database.php';
include_once '../models/Imone.php';


$database = new Database();
$db = $database->connect();

// Instantiate imone object

$Imone = new Imone($db);

$year = date('Y');

$Imone->path = "\monthly-" . $year . ".csv";


$Imone->delete();
$Imone->load_table();
