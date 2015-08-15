<?php
set_time_limit(0);
//pokemon
$pokedex = file_get_contents('json/pokedex.json');
$pokedex_data = json_decode($pokedex, true);

foreach($pokedex_data['pokemon'] as $row){
	$name = $row['name'];
	
	$pokemon = file_get_contents('http://pokeapi.co/' . $row['resource_uri']);
	file_put_contents('json/pokemon/' . $name, $pokemon);
	

	$pokemon_description = file_get_contents('http://pokeapi.co/' . str_replace('pokemon', 'description', $row['resource_uri']));
	file_put_contents('json/pokemon_descriptions/' . $name, $pokemon_description);
}