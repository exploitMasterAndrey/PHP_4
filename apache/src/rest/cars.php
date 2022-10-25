<?php
include('db/car-repository.php');

header("Content-Type: application/json; charset=UTF-8");
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        echo json_encode(CarRepository::read());
        break;
    case 'POST':
        $newCar = json_decode(file_get_contents('php://input'));
        CarRepository::create($newCar->name, $newCar->price);
        break;
    case 'PUT':
        $newCar = json_decode(file_get_contents('php://input'));
        echo CarRepository::update($newCar->id, $newCar->name, $newCar->price);
        break;
    case 'DELETE':
        $oldCar = json_decode(file_get_contents('php://input'));
        echo CarRepository::delete($oldCar->id);
        break;
    }
    ?>