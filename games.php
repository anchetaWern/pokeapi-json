<?php
set_time_limit(0);

//games
$max_games = 25;
for($x = 1; $x <= $max_games; $x++){
	if($x == 4){
		$game_data = file_get_contents('http://pokeapi.co/api/v1/game/' . $x);
		file_put_contents('json/games/game' . $x, $game_data);
	}
}