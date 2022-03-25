<?php

$nameTeam=$_POST['nameTeam'];
$teams= array();
//Leemos el JSON
try {

    if(!file_exists("teams.json")){
        throw new Exception();
    }else{
        $datos_teams = file_get_contents("teams.json");
        $json_teams = json_decode($datos_teams, true);

        foreach ($json_teams as $team) {
            if(strcmp($team['name'],$nameTeam)==0){
                
            }else{
                array_push($teams,$team);
            }
       }
    }
    }catch(Exception $a){
    }
    //Creamos el Json
    $json_string = json_encode($teams);
    $file = 'teams.json';
    file_put_contents($file, $json_string);

    echo $json_string;
