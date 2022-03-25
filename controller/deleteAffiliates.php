<?php
$id = $_POST['numDoc'];
$affiliates=array();

 //Leemos el JSON
 try {

    if(!file_exists("affiliates.json")){
        throw new Exception();
    }else{
        $datos_affiliates = file_get_contents("affiliates.json");
        $json_affiliates = json_decode($datos_affiliates, true);

        foreach ($json_affiliates as $affiliate) {
            if(strcmp($affiliate['numDoc'],$id)==0){
                
            }else{
                array_push($affiliates,$affiliate);
            }
       }
    }
    }catch(Exception $a){

    }
//Creamos el Json
$json_string = json_encode($affiliates);
$file = 'affiliates.json';
file_put_contents($file, $json_string);

echo $json_string;


