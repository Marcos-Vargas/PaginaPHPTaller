<?php

require_once '../model/Team.php';
$teams=array();

$code;
$name = $_POST['name'];

 //Leemos el JSON
 try {

    if ( !file_exists("teams.json")) {
        throw new Exception();
    }else{
        $datos_teams = file_get_contents("teams.json");
        $json_teams = json_decode($datos_teams, true);
        foreach ($json_teams as $team) {
          array_push($teams,$team);
        }
    } 
	}catch (Exception $a){
    }

$team= new Team($name,null,true,0);
$out= new stdClass();
$out->name= $team->getName();
$out->affiliates= array();
$out->state= $team->getState();
$out->rank= $team->getRank();

array_push($teams,$out);

//Creamos el Json

$json_string = json_encode($teams);
$file = 'teams.json';
file_put_contents($file, $json_string);

echo $json_string;

