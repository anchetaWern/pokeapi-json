<?php
set_time_limit(0);

//types
$max_types = 18;

for($x = 1; $x <= $max_types; $x++){

	$type_data = file_get_contents('http://pokeapi.co/api/v1/type/' . $x);
	file_put_contents('json/types/type' . $x, $type_data);

}