<?php
include('db/part-repository.php');

header("Content-Type: application/json; charset=UTF-8");
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode(PartRepository::read());
        break;
    case 'POST':
        $newPart = json_decode(file_get_contents('php://input'));
        PartRepository::create($newPart->name, $newPart->price);
        break;
    case 'PUT':
        $newPart = json_decode(file_get_contents('php://input'));
        echo PartRepository::update($newPart->id, $newPart->name, $newPart->price);
        break;
    case 'DELETE':
        $oldPart = json_decode(file_get_contents('php://input'));
        echo PartRepository::delete($oldPart->id);
        break;
    }
    ?>