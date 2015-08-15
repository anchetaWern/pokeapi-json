<?php
set_time_limit(0);
//pokedex
$pokedex = file_get_contents('http://pokeapi.co/api/v1/pokedex/1/');
file_put_contents('json/pokedex.json', $pokedex);