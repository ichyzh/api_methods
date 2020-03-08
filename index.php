<?php

require_once 'Api.php';

$file = 'D4 Price List_2017.csv';
if(!file_exists($file) || !is_readable($file)) {
    return false;
}

$api = new API();
$data_all = $api->getAll($file);
$data_by_model = $api->getByModel($file, 'D4-100');
