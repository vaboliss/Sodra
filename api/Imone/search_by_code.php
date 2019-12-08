<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../models/Imone.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object

$Imone = new Imone($db);



$data = json_decode(file_get_contents("php://input"));

if (empty($data->code)) {
    echo json_encode(
        array('message' => 'There are no name parameter')
    );
    die();
}

$Imone->code = $data->code;

$result = $Imone->search_by_code();

$num = $result->rowCount();

if ($num > 0) {

    $posts_arr = array();
    $posts_arr['data'] = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $post_item = array(
            'code' => $code,
            'jarCode' => $JarCode,
            'name' => $name,
            'month' => $month,
            'avgWage' => $avgWage,
            'avgWage2' => $avgWage2,
            'numInsured' => $numInsured,
            'numInsured2' => $numInsured2,
            'tax' => $tax,
            'ecoActName' => $ecoActName,
            'ecoActCode' => $ecoActCode,
            'municipality' => $municipality
        );

        //Push to "data"

        array_push($posts_arr['data'], $post_item);
    }

    //Turn to json
    echo json_encode($posts_arr);
} else {
    //Doesn't exists
    echo json_encode(
        array('message' => 'Not Found')
    );
}
