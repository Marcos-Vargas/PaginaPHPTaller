<?php
require_once '../model/Events.php';
$events=array();
$disciplines=array();
$cho=0;

$nameEvent=$_POST['nameEvent'];
$discipline=$_POST['discipline'];

$code=(string)rand(1000,2000);
 //Leemos el JSON events
 try {

    if ( !file_exists("events.json")) {
        throw new Exception();
    }else{
        $datos_events = file_get_contents("events.json");
        $json_events = json_decode($datos_events, true);
        foreach ($json_events as $event) {
          array_push($events,$event);
        }
        $cant = count($events);
         for ($i=0; $i <$cant; $i++) { 
            if(strcmp($events[$i]["code"],$code)==0){
                $code=(string)rand(1000,2000);
                $i=0;
            }
        } 
    } 
	}catch (Exception $a){
    }


     //Leemos el JSON disciplines
 try {

    if ( !file_exists("disciplines.json")) {
        throw new Exception();
    }else{
        $datos_disciplines = file_get_contents("disciplines.json");
        $json_disciplines = json_decode($datos_disciplines, true);
        foreach ($json_disciplines as $disciplin) {
          array_push($disciplines,$disciplin);
        }

    } 
	}catch (Exception $a){
    }

    foreach($disciplines as $dis){
        if(strcmp($dis['name'],$discipline)==0){
            if($dis['type']=="team"){
                $cho=1;
            }else{
            }
        }
    }
    if($cho==1){
        $event=new Events($code,$discipline,$nameEvent,null,null,true);
        $out= new stdClass();
        $out->code=$event->getCode();
        $out->discipline=$event->getDiscipline();
        $out->nameEvent=$event->getName();
        $out->affiliates=null;
        $out->teams=array();
        $out->state=$event->getState();
    }else{
        $event=new Events($code,$discipline,$nameEvent,null,null,true);
        $out= new stdClass();
        $out->code=$event->getCode();
        $out->discipline=$event->getDiscipline();
        $out->nameEvent=$event->getName();
        $out->affiliates=array();
        $out->teams=null;
        $out->state=$event->getState();

    }




array_push($events,$out);

//Creamos el Json

$json_string = json_encode($events);
$file = 'events.json';
file_put_contents($file, $json_string);

echo $json_string;







