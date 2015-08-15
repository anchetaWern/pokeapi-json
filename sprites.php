<?php
set_time_limit(0);

//sprites
$dir = new DirectoryIterator('json/pokemon');
foreach($dir as $fileinfo){
    if(!$fileinfo->isDot()){
        $pokemon = $fileinfo->getFilename();
        $pokemon_json = file_get_contents('json/pokemon/' . $pokemon);
        $pokemon_data = json_decode($pokemon_json, true);
        $sprites = $pokemon_data['sprites'];
        foreach($sprites as $sprite){
            $sprite_uri = $sprite['resource_uri'];

            $sprite_filename = basename($sprite_uri);

            $sprite = file_get_contents('http://pokeapi.co' . $sprite_uri);
            $sprite_data = json_decode($sprite, true);

            file_put_contents('json/sprites/' . $sprite_filename, $sprite);

            $image = $sprite_data['image'];
            $image_data = file_get_contents('http://pokeapi.co' . $image);
            $filename = basename($image);
            file_put_contents('media/img/' . $filename, $image_data);

        }
    }
}