<?php
$json = file_get_contents('https://maps.googleapis.com/maps/api/place/textsearch/json?query=japan&key=AIzaSyDog7hXlhQFMMuvI4PWVeMnhG_R_v8oFsk&type=airport');
$obj = json_decode($json);
echo $json;
?>