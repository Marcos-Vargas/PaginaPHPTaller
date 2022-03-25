<?php

$discipline=$_POST['discipline'];
$nameEvent=$_POST['nameEvent'];
$addItem=$_POST['item'];
$events=array();

//Leemos el JSON teams
try {

    if(!file_exists("teams.json")){
        throw new Exception();
    }else{
        $datos_teams = file_get_contents("teams.json");
        $json_teams = json_decode($datos_teams, true);

        foreach ($json_teams as $team) {
            if(strcmp($team['name'],$addItem)==0){
                $out=$team;
            }else{

            }
       }
    }
    }catch(Exception $a){
        echo "Error aqui";
    }
    
//Leemos el JSON affiliates
try {

    if(!file_exists("affiliates.json")){
        throw new Exception();
    }else{
        $datos_affiliates = file_get_contents("affiliates.json");
        $json_affiliates = json_decode($datos_affiliates, true);

        foreach ($json_affiliates as $affiliate) {
            if(strcmp($affiliate['numDoc'],$addItem)==0){
                $out=$affiliate;
            }else{
            }
       }
    }
    }catch(Exception $a){

        echo "Error aqui tambien";

    }

//Leemos el JSON events
try {

    if ( !file_exists("events.json")) {
        throw new Exception();
    }else{
        $datos_events = file_get_contents("events.json");
        $json_events = json_decode($datos_events, true);
        foreach ($json_events as $event) {
            if(strcmp($event['nameEvent'],$nameEvent)==0){
                if($event['affiliates']===null){

                    array_push($event['teams'],$out);

                }else{
                    array_push($event['affiliates'],$out);
                }
            }


          array_push($events,$event);
        }
    } 
	}catch (Exception $a){
    }


    //Creamos el Json

$json_string = json_encode($events);
$file = 'events.json';
file_put_contents($file, $json_string);

echo $json_string;
/* echo $json_string ; */

