<?php
require '../vendor/autoload.php';
set_time_limit(0);
$client = \Doctrine\CouchDB\CouchDBClient::create(array('dbname' => 'pokedex'));

//pokemon
$pokedex = file_get_contents('http://pokeapi.co/api/v1/pokedex/1/');
$pokedex_data = json_decode($pokedex, true);


foreach($pokedex_data['pokemon'] as $row){
	
	
	$name = $row['name'];
	
	$pokemon = file_get_contents('http://pokeapi.co/' . $row['resource_uri']);
	$pokemon = json_decode($pokemon, true);

	$pokemon_description = file_get_contents('http://pokeapi.co/' . $pokemon['descriptions'][0]['resource_uri']);
	
	$pokemon['description'] = json_decode($pokemon_description, true)['description'];
	
	$pokemon_sprites = file_get_contents('http://pokeapi.co' . $pokemon['sprites'][0]['resource_uri']);
	$pokemon_sprites = json_decode($pokemon_sprites, true);

	$pokemon['small_photo'] = 'http://pokeapi.co' . $pokemon_sprites['image'];
	$pokemon['photo'] = 'http://img.pokemondb.net/artwork/' . strtolower($pokemon['name']) . '.jpg';

	$client->postDocument($pokemon);

}