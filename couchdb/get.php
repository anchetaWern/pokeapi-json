<?php
require '../vendor/autoload.php';

$client = \Doctrine\CouchDB\CouchDBClient::create(array('dbname' => 'pokedex'));

$pokemon = $_GET['name'];

$query = $client->createViewQuery('pokemon', 'by_name');
$query->setKey($pokemon);
$query->setReduce(false);
$query->setIncludeDocs(true);
$result = $query->execute();

$data = $result[0];


echo json_encode($data);