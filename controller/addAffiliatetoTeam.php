<?php
$id=$_POST['id'];
$teamchoose=$_POST['teamchoose'];

$affiliates=array();
$teams=array();
$out;
try {
if(!file_exists("affiliates.json")){
    throw new Exception();
}else{
    $datos_affiliates = file_get_contents("affiliates.json");
    $json_affiliates = json_decode($datos_affiliates, true);

    foreach ($json_affiliates as $affiliate) {
        if(strcmp($affiliate['numDoc'],$id)==0){
            $out=$affiliate;
        }else{
        }
   }
}
}catch(Exception $a){

}

 //Leemos el JSON teams
 try {

    if ( !file_exists("teams.json")) {
        throw new Exception();
    }else{
        $datos_teams = file_get_contents("teams.json");
        $json_teams = json_decode($datos_teams, true);
        foreach ($json_teams as $team) {
            if($team['name']==$teamchoose){
                array_push($team['affiliates'],$out);
            }else{
                
            }
          array_push($teams,$team);
        }
    } 
	}catch (Exception $a){
    }


    //Creamos el Json

$json_string = json_encode($teams);
$file = 'teams.json';
file_put_contents($file, $json_string);

echo $json_string;