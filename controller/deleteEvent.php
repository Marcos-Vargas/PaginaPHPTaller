<?php

$nameEvent=$_POST['nameEvent'];
$events= array();
//Leemos el JSON
try {

    if(!file_exists("events.json")){
        throw new Exception();
    }else{
        $datos_events = file_get_contents("events.json");
        $json_events = json_decode($datos_events, true);

        foreach ($json_events as $event) {
            if(strcmp($event['nameEvent'],$nameEvent)==0){
                
            }else{
                array_push($events,$event);
            }
       }
    }
    }catch(Exception $a){
    }
    //Creamos el Json
    $json_string = json_encode($events);
    $file = 'teams.json';
    file_put_contents($file, $json_string);

    echo $json_string;
