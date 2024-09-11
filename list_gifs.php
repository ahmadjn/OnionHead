<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');
$gifFolder = 'gifs/';

if (!is_dir($gifFolder)) {
    error_log("Error: Directory '$gifFolder' does not exist");
    echo json_encode(['error' => "Directory '$gifFolder' does not exist"]);
    exit;
}

$gifs = glob($gifFolder . '*.gif');

if ($gifs === false) {
    error_log("Error: Unable to read directory '$gifFolder'");
    echo json_encode(['error' => "Unable to read directory '$gifFolder'"]);
    exit;
}

$gifList = array_map(function($gif) use ($gifFolder) {
    return str_replace($gifFolder, '', $gif);
}, $gifs);

echo json_encode($gifList);
