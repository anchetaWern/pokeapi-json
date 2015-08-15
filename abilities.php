<?php
set_time_limit(0);

//abilities
$max_abilities = 248;
for($x = 1; $x <= $max_abilities; $x++){

	$ability_data = file_get_contents($base_uri . 'api/v1/ability/' . $x);
	file_put_contents('json/abilities/ability' . $x, $ability_data);

}