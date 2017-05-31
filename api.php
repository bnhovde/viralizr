<?php
    header("Access-Control-Allow-Origin: *");
    $data = file_get_contents("data.json");
    $json_data = json_decode($data, true);

    $amount = (!empty($_GET["amount"])) ? intval($_GET["amount"]) : 1; 
    $sanitized_amount = preg_replace('/[^-a-zA-Z0-9_]/', '', min($amount, 500));

    $createRandomString = function() use ($json_data) {
        $intro = array_rand($json_data["intro"], 1);
        $middle = array_rand($json_data["middle"], 1);
        $outro = array_rand($json_data["outro"], 1);
        return $json_data["intro"][$intro] . ' ' . $json_data["middle"][$middle] . ' ' . $json_data["outro"][$outro];
    };

    // Pick random string (times amount)
    $arr = array_fill(0, $sanitized_amount, null);
    $results = array_map($createRandomString, $arr);

    // Get some 
    exit(json_encode($results));
?>