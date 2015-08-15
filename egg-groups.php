<?php
set_time_limit(0);
//egg groups
$max_egg_groups = 15;
for($x = 1; $x <= $max_egg_groups; $x++){

	$egg_data = file_get_contents('http://pokeapi.co/api/v1/egg/' . $x);
	file_put_contents('json/egg_groups/egg' . $x, $egg_data);

}