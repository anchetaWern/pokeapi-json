<?php
set_time_limit(0);

//moves
$max_moves = 625;
for($x = 1; $x <= $max_moves; $x++){

	$move_data = file_get_contents('http://pokeapi.co/api/v1/move/' . $x);
	file_put_contents('json/moves/move' . $x, $move_data);

}