<?php

$daten = [
  "test"=>"meine Daten aus der php datei"
];

header("Content-Type:application/json;charset=utf-8");
echo json_encode($daten);
