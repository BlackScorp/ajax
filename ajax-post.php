<?php
sleep(5);
$daten = [
"test"=>$_POST['meinText']
];

header("Content-Type:application/json;charset=utf-8");
echo json_encode($daten);
