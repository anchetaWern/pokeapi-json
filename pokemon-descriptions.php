<?php
set_time_limit(0);

//descriptions
$dir = new DirectoryIterator('json/pokemon');
foreach($dir as $fileinfo){
    if(!$fileinfo->isDot()){
        $pokemon = $fileinfo->getFilename();
        $pokemon_json = file_get_contents('json/pokemon/' . $pokemon);
        $pokemon_data = json_decode($pokemon_json, true);
        

        $descriptions = $pokemon_data['descriptions'];
        foreach($descriptions as $desc){

            $description_name = $desc['name'];
            
            if(!file_exists('json/pokemon_descriptions/' . $description_name)){

                $description_uri = $desc['resource_uri'];
                
                echo $description_name . "<br>";

                $description = file_get_contents('http://pokeapi.co' . $description_uri);
                
                file_put_contents('json/pokemon_descriptions/' . $description_name, $description);
            }
            
        }
        
    }
}